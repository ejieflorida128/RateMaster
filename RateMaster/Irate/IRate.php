<?php
include("../connection.php");
include("Irate_sidebar.php");

// Check if form is submitted
if(isset($_POST["submit"])) {
    $target_dir = "../IRate/Irate_images/"; // Directory for storing Irate images
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) { // Adjusted file size limit to 5MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only image file formats
    $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
    if(!in_array($imageFileType, $allowedFileTypes)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

            // Insert uploaded image info into the database
            $title = basename($_FILES["fileToUpload"]["name"]);
            $description = ""; // You can add a description field in your form to capture this
            $thumbnail_url = $target_file; // Thumbnail is the uploaded image itself
            $rating = 0; // Initialize the rating as 0
            $upload_date = date('Y-m-d H:i:s');

            // Insert into the database
            $query = "INSERT INTO Irate (title, description, thumbnail_url, rating, upload_date) VALUES ('$title', '$description', '$thumbnail_url', $rating, '$upload_date')";
            if(mysqli_query($conn, $query)) {
                $Irate_id = mysqli_insert_id($conn); // Retrieve the last inserted Irate_id
                echo " Irate record inserted successfully with ID: $Irate_id.";
                
                // Redirect to prevent form resubmission
                header("Location: ".$_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Error inserting Irate record: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Irate Management System</title>
<link rel="stylesheet" href="../filedesign/filerate.css">
<style>
    .Irate-thumbnails {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* 4 columns with equal width */
        grid-gap: 10px; /* Gap between grid items */
    }

    .Irate-thumbnail {
        width: 200px; /* Set a fixed width for the thumbnail container */
        height: 200px; /* Set a fixed height for the thumbnail container */
        overflow: hidden; /* Hide overflowing content */
    }

    .Irate-thumbnail img {
        width: 100%; /* Set the width of the image to 100% of its container */
        height: auto; /* Maintain aspect ratio */
        object-fit: cover; /* Cover the entire container while maintaining aspect ratio */
    }
</style>
</head>
<body>

<button class="upload-button" onclick="document.getElementById('myModal').style.display='block'">Upload Image</button>

<div class="upload-form">
  <!-- Upload button to trigger the modal -->

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
      <h2>Upload Image</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
      </form>
    </div>
  </div>
</div>

<div class="main-content">
<div class="Irate-thumbnails">
    <!-- Irate Thumbnails/Grid View -->
    <?php
    $query = "SELECT * FROM Irate LIMIT 16"; // Limiting to 16 Irate
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="Irate-thumbnail">';
        echo '<a href="Irate_details.php?Irate_id=' . $row['Irate_id'] . '">';
        echo '<img src="' . $row['thumbnail_url'] . '" alt="' . $row['title'] . '">';
        echo '<h3>' . $row['title'] . '</h3>';
        echo '</a>';
        echo '</div>';
    }
    ?>
</div>

  <div class="pagination">
    <!-- Pagination -->
    <button>1</button>
    <button>2</button>
    <button>3</button>
    <!-- More pagination buttons here -->
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('myModal');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

</body>
</html>
