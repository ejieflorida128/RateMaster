<?php
include("../connection.php");
include("E_hype_sidebar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['E_HYpe_Id']) && isset($_POST['rating'])) {
        $E_HYpe_Id = $_POST['E_HYpe_Id'];
        $rating = $_POST['rating'];

        // Update the item's rating in the items table
        $update_query = "UPDATE product SET rate = '$rating' WHERE id = $E_HYpe_Id";
        $update_result = mysqli_query($connForEjie, $update_query);

        $txt = "A user rated an item in the E Hype Beast Shop Management System!";

        $insertLog = "INSERT INTO log (type,message) VALUES ('hype','$txt')";
        mysqli_query($conn,$insertLog);

        if ($update_result) {
            header('Location: E_hypeRate.php');
            exit; // Stop further execution after redirection
        } else {
            echo "Error updating rating: " . mysqli_error($connForEjie);
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Details</title>
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }
        .star {
            cursor: pointer;
            text-shadow: 1px 1px 1px #000;
        }
        input[type=radio] {
            display: none;
        }
        label:before {
            content: '★';
            color: gray;
        }
        input[type=radio]:checked ~ label:before {
            color: gold;
        }
    </style>
</head>
<body>

    <?php
    if(isset($_GET['Hype_Id'])) {
        $id = mysqli_real_escape_string($connForEjie, $_GET['Hype_Id']);
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $query = mysqli_query($connForEjie, $sql);

        if(mysqli_num_rows($query) > 0) {
            $test = mysqli_fetch_assoc($query);
    ?>
            <img src="../images/<?php echo $test['image']; ?>" style="width: 400px; height: 400px; margin-left: 400px;">
            <h4 style="margin-left: 400px;"><?php echo $test['item_name'] ?></h4>
            <h4 style="margin-left: 400px;"><?php echo $test['price'] ?></h4>
            <h4 style="margin-left: 400px;"><?php echo $test['brand'] ?></h4>
            <h4 style="margin-left: 400px;"><?php echo $test['item_type'] ?></h4>
            <h4 style="margin-left: 400px;"><?php echo $test['seller_type'] ?></h4>

            <form action="E_hype_details.php" method="post" style="margin-left: 400px;">
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars" class="star"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars" class="star"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars" class="star"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars" class="star"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star" class="star"></label>
                </div>
                <input type="hidden" name="E_HYpe_Id" value="<?php echo $id; ?>">

                <button type="submit">Submit Rating</button>
            </form>
             <!-- Back Button -->
            <button onclick="history.back()">Back</button>
    <?php
        } else {
           echo "Error: Item not found.";
        }
    } 
    ?>

</body>
</html>
