<?php
ob_start(); // Start output buffering
include("../connection.php");
include("file_sidebar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id'], $_POST['rating'])) {
        $file_id = $_POST['id'];
        $rating = $_POST['rating'];

        // Retrieve existing total rating and total rating count from database
        $select_query = "SELECT total_rating, rating_count FROM file_list WHERE id = $file_id";
        $select_result = mysqli_query($connForEjie, $select_query);

        if ($select_result && mysqli_num_rows($select_result) > 0) {
            $row = mysqli_fetch_assoc($select_result);
            $total_rating = $row['total_rating'] + $rating;
            $rating_count = $row['rating_count'] + 1;

            // Update total rating and rating count in the database
            $update_query = "UPDATE file_list SET total_rating = $total_rating, rating_count = $rating_count WHERE id = $file_id";
            $update_result = mysqli_query($connForEjie, $update_query);

            if ($update_result) {
                $txt = "A user rated a file in the File Resources Management System!";
                $insertLog = "INSERT INTO log (type,message) VALUES ('filerate','$txt')";
                mysqli_query($conn, $insertLog);

                header('Location: FileRating.php');
                exit; // Stop further execution after redirection
            } else {
                echo "Error updating rating: " . mysqli_error($connForEjie);
            }
        } else {
            echo "Error retrieving file details.";
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
            font-size: 40px;
            justify-content: left;
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
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM file_list WHERE id = $id";
        $query = mysqli_query($connForEjie, $sql);

        if(mysqli_num_rows($query) > 0) {
            $file_details = mysqli_fetch_assoc($query);
            $total_rating = $file_details['total_rating'];
            $rating_count = $file_details['rating_count'];
    ?>
            <img src="file/file.jpg<?php echo $file_details['file']; ?>" style="width: 400px; height: 400px; margin-left: 400px; margin-top:10px;">
            <h4 style="margin-left: 400px; color: white;">Title: <?php echo $file_details['title'] ?></h4>
            <h4 style="margin-left: 400px; color: white;">Price: $<?php echo $file_details['price'] ?></h4>
            <h4 style="margin-left: 400px; color: white;">Description: <?php echo $file_details['description'] ?></h4>

            <!-- Display average rating -->
            <h4 style="margin-left: 400px; color: white;">Average Rating: <?php echo ($rating_count > 0) ? number_format($total_rating / $rating_count, 1) : 'N/A'; ?></h4>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin-left: 400px;">
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars" class="star"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars" class="star"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars" class="star"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars" class="star"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star" class="star"></label>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <button type="submit">Submit Rating</button>
            </form>
             <!-- Back Button -->
             <br>
            <button onclick="history.back()" style="margin-left: 400px;  background-color: blue; color: white; border-radius: 5px;">Back</button>
    <?php
        } else {
           echo "Error: File not found.";
        }
    } 
    ?>

</body>
</html>
<?php
ob_end_flush(); // Flush the output buffer and send the output to the browser
?>
