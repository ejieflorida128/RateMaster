
<?php
session_start(); // Start the session
include("../fileadmin/admin_navbar.php");

// Check if form is submitted
if(isset($_POST["submit"])) {
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists in the database
    $query_check_file = "SELECT * FROM document WHERE title = '" . basename($_FILES["fileToUpload"]["name"]) . "'";
    $result_check_file = mysqli_query($conn, $query_check_file);
    if(mysqli_num_rows($result_check_file) > 0) {
        $_SESSION['upload_status'] = "error";
        $_SESSION['upload_message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        $_SESSION['upload_status'] = "error";
        $_SESSION['upload_message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_formats = array("pdf", "docx", "txt", "pptx", "xlsx", "ppt", "xls");
    if(!in_array($imageFileType, $allowed_formats)) {
        $_SESSION['upload_status'] = "error";
        $_SESSION['upload_message'] = "Sorry, only PDF, DOCX, TXT, PPTX, PPT, XLSX, and XLS files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['upload_status'] = "error";
        $_SESSION['upload_message'] = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['upload_status'] = "success";
            $_SESSION['upload_message'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

            // Insert uploaded file info into the database
            $title = basename($_FILES["fileToUpload"]["name"]);
            $description = "Description of the uploaded file goes here."; // You can change this description as needed
            $thumbnail_url = "thumbnails/default_thumbnail.jpg"; // You can set a default thumbnail URL or generate thumbnails dynamically
            $rating = 0; // Initialize the rating as 0
            $upload_date = date('Y-m-d H:i:s');

            // Insert into the database
            $query = "INSERT INTO document (title, description, thumbnail_url, rating, upload_date) VALUES ('$title', '$description', '$thumbnail_url', $rating, '$upload_date')";
            if(mysqli_query($conn, $query)) {
                $document_id = mysqli_insert_id($conn); // Retrieve the last inserted document_id
                $_SESSION['upload_status'] = "success";
                $_SESSION['upload_message'] = "Document record inserted successfully with ID: $document_id.";
            } else {
                $_SESSION['upload_status'] = "error";
                $_SESSION['upload_message'] = "Error inserting document record: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['upload_status'] = "error";
            $_SESSION['upload_message'] = "Sorry, there was an error uploading your file.";
        }
    }
    // Redirect to prevent form resubmission on refresh
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document Management System</title>
<link rel="stylesheet" href="../filedesign/.css">
</head>
<body>

<button class="upload-button" onclick="document.getElementById('myModal').style.display='block'">Upload File</button>

<div class="upload-form">
  <!-- Upload button to trigger the modal -->

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
      <h2>Upload File</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
      </form>
    </div>
  </div>
</div>

<div id="uploadModal" class="modal" style="display:<?php echo isset($_SESSION['upload_status']) ? 'block' : 'none'; ?>">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="document.getElementById('uploadModal').style.display='none'">&times;</span>
    <h2><?php echo isset($_SESSION['upload_status']) && $_SESSION['upload_status'] == 'success' ? 'Success' : 'Error'; ?></h2>
    <p><?php echo isset($_SESSION['upload_message']) ? $_SESSION['upload_message'] : ''; ?></p>
  </div>
</div>

<div class="main-content">
    <header>
        <h1>File Rate Management System</h1>
    </header>
    <div class="document-thumbnails">
        <!-- Document Thumbnails/Table View -->
        <table>
            <tr>
                <?php
                // Pagination variables
                $limit = 30; // Number of documents per page
                $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
                $start = ($page - 1) * $limit; // Starting index for fetching documents

                // Query to fetch documents for the current page
                $query = "SELECT * FROM document LIMIT $start, $limit";
                $result = mysqli_query($conn, $query);

                // Fetch and display documents
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($count % 3 == 0) {
                        echo '</tr><tr>';
                    }
                    echo '<td>';
                    echo '<a href="docs.php?doc_id=' . $row['document_id'] . '">';
                    echo '<div class="document-thumbnail">';
                    echo '<img src="' . $row['thumbnail_url'] . '" alt="' . $row['title'] . '">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '</div>';
                    echo '</a>';
                    echo '</td>';
                    $count++;
                }
                ?>
            </tr>
        </table>
    </div>

    <div class="pagination">
        <!-- Pagination -->
        <?php
        // Query to fetch total number of documents
        $total_query = "SELECT COUNT(*) AS total FROM document";
        $total_result = mysqli_query($conn, $total_query);
        $total_data = mysqli_fetch_assoc($total_result);
        $total_documents = $total_data['total'];

        // Calculate total number of pages
        $total_pages = ceil($total_documents / $limit);

        // Display pagination links
        for($i = 1; $i <= $total_pages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a>';
        }
        ?>
    </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('myModal');
  var uploadModal = document.getElementById('uploadModal');

// Get the modal
var modal = document.getElementById('myModal');

// Function to close the modal
function closeModal() {
    modal.classList.add('fade-out'); // Add fade-out class for animation
    setTimeout(function() {
        modal.style.display = "none"; // Hide the modal after animation
        modal.classList.remove('fade-out'); // Remove fade-out class for next use
    }, 300); // Adjust the duration of the animation (in milliseconds)
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}

// Function to display the modal
function displayModal() {
    modal.style.display = "block"; // Display the modal
    // Automatically close the modal after 3 seconds (adjust as needed)
    setTimeout(closeModal, 3000);
}

</script>

</body>
</html>

<?php
// Unset the session variables
unset($_SESSION['upload_status']);
unset($_SESSION['upload_message']);
?>
