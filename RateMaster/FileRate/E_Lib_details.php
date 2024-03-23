<?php
ob_start(); // Start output buffering
include("../connection.php");
include("file_sidebar.php");

// Initialize $book_id variable
$book_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['book_id'], $_POST['rating'])) {
        $book_id = mysqli_real_escape_string($connForEjie, $_POST['book_id']);
        $rating = mysqli_real_escape_string($connForEjie, $_POST['rating']);

        // Update the item's rating in the items table
        $update_query = "UPDATE tblbooks SET Bookratings = '$rating' WHERE id = '$book_id'";
        $update_result = mysqli_query($connForEjie, $update_query);

        if ($update_result) {
            header('Location: E_Library.php?item_id=' . $book_id);
            exit(); // Exit to avoid executing further code
        } else {
            echo "Error updating rating: " . mysqli_error($connForEjie);
        }
    } 
}

// Fetch book details if $book_id is set
$book_details = array();
if (!empty($book_id)) {
    $sql = "SELECT * FROM tblbooks WHERE id = '$book_id'";
    $result = mysqli_query($connForEjie, $sql);
    $book_details = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<br>
<header>
    <h1>List of Books</h1>
</header>
<br>
<div class="container">
    <?php if (!empty($book_details)): ?>
    <!-- Display book details if available -->
    <div>
        <h2>Book Details</h2>
        <p>Book ID: <?php echo $book_details['id']; ?></p>
        <p>Book Name: <?php echo $book_details['BookName']; ?></p>
        <p>Category ID: <?php echo $book_details['CatId']; ?></p>
        <p>Author ID: <?php echo $book_details['AuthorId']; ?></p>
        <p>Book Price: $<?php echo $book_details['BookPrice']; ?></p>
        <!-- Add more details as needed -->
    </div>
    <?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Category ID</th>
                <th>Author ID</th>
                <th>Book Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tblbooks";
            $query = mysqli_query($connForEjie, $sql);
            $count = 1;
            while($row = mysqli_fetch_assoc($query)){
                $bookId = $row['id'];
                $bookName = $row['BookName'];
                $catId = $row['CatId'];
                $authorId = $row['AuthorId'];
                $bookPrice = $row['BookPrice'];
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $bookName; ?></td>
                <td><?php echo $catId; ?></td>
                <td><?php echo $authorId; ?></td>
                <td>$<?php echo $bookPrice; ?></td>
                <td>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="rating">
                            <input type="radio" id="star5_<?php echo $bookId; ?>" name="rating" value="5" /><label for="star5_<?php echo $bookId; ?>" title="5 stars" class="star"></label>
                            <input type="radio" id="star4_<?php echo $bookId; ?>" name="rating" value="4" /><label for="star4_<?php echo $bookId; ?>" title="4 stars" class="star"></label>
                            <input type="radio" id="star3_<?php echo $bookId; ?>" name="rating" value="3" /><label for="star3_<?php echo $bookId; ?>" title="3 stars" class="star"></label>
                            <input type="radio" id="star2_<?php echo $bookId; ?>" name="rating" value="2" /><label for="star2_<?php echo $bookId; ?>" title="2 stars" class="star"></label>
                            <input type="radio" id="star1_<?php echo $bookId; ?>" name="rating" value="1" /><label for="star1_<?php echo $bookId; ?>" title="1 star" class="star"></label>
                        </div>
                        <input type="hidden" name="book_id" value="<?php echo $bookId; ?>">
                        <button type="submit" class="btn btn-success">Rate</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and jQuery (Optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
ob_end_flush(); // Flush the output buffer and send the output to the browser
?>
