<?php
include("../connection.php");
include("file_sidebar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Books</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   

    <div class="container">
        <h2>List of Books</h2>
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
                $query = mysqli_query($connForEjie,$sql);
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
                        <a href='E_Lib_details.php?item_id=<?php echo $bookId; ?>' class="btn btn-success">Rate</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
