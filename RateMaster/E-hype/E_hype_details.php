<?php
ob_start(); // Start output buffering
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
            justify-content: left;
            font-size: 40px;
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
     /* Style for the submit button */
        button[type=submit] {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,2.5); /* Add shadow */
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
            <h4 style="margin-left: 400px;">Name: <?php echo $test['item_name'] ?></h4>
            <h4 style="margin-left: 400px;">Price: $<?php echo $test['price'] ?></h4>
            <h4 style="margin-left: 400px;">Brand: <?php echo $test['brand'] ?></h4>
            <h4 style="margin-left: 400px;">Type: <?php echo $test['item_type'] ?></h4>
            <h4 style="margin-left: 400px;">Seller: <?php echo $test['seller_type'] ?></h4>

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
             <br>
            <button onclick="history.back()" style="margin-left: 400px; background-color: blue; color: white; border-radius: 5px;">Back</button>
    <?php
        } else {
           echo "Error: Item not found.";
        }
    } 
    ?>

</body>
</html>
<?php
ob_end_flush(); // Flush the output buffer and send the output to the browser
?>