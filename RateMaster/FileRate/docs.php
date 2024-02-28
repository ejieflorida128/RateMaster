<?php
include("../connection.php");
include("file_sidebar.php");

// Set the number of comments per page
$commentsPerPage = 2;

// Retrieve document details from the database
if(isset($_GET['doc_id'])) {
    $document_id = $_GET['doc_id'];
    $query = "SELECT * FROM document WHERE document_id = $document_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $document_title = $row['title'];
        $thumbnail_url = $row['thumbnail_url'];
        // You can fetch other document details as needed
    } else {
        // Handle case when document ID is not found
        echo "Document not found.";
        exit(); // Stop execution if document ID is invalid
    }
} else {
    // Handle case when document ID is not provided
    echo "Document ID is required.";
    exit(); // Stop execution if document ID is not provided
}

// Handle form submission
if(isset($_POST["submit"])) {
    $user_id = 1; // Assuming user ID 1 for demonstration, you should replace this with actual user ID
    // Check if rating is set
    if(isset($_POST["rating"])) {
        $rating = $_POST["rating"];
        // Perform database update or insertion for rating with current timestamp
        $insert_rating_query = "INSERT INTO rating (document_id, user_id, rating, rating_date) VALUES ($document_id, $user_id, $rating, NOW())";
        if(mysqli_query($conn, $insert_rating_query)) {
            echo "Rating inserted successfully.";
            // Update document table with new rating
            $update_document_query = "UPDATE document SET rating = $rating WHERE document_id = $document_id";
            mysqli_query($conn, $update_document_query);
        } else {
            echo "Error inserting rating: " . mysqli_error($conn);
        }
    }
    // Check if comment is set
    if(isset($_POST["comment_text"])) {
        $comment_text = $_POST["comment_text"];
        // Perform database insertion for comment with current timestamp
        $insert_comment_query = "INSERT INTO commento (document_id, user_id, comment_text, comment_date, rating, rating_date) VALUES ($document_id, $user_id, '$comment_text', NOW(),$rating, NOW())";
        if(mysqli_query($conn, $insert_comment_query)) {
            echo "Comment inserted successfully.";
            // Redirect to prevent form resubmission
            header("Location: {$_SERVER['REQUEST_URI']}");
            exit();
        } else {
            echo "Error inserting comment: " . mysqli_error($conn);
        }
    }
}

// Calculate current page number for comments
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $commentsPerPage;

// Fetch comments from the database for this document with pagination
$fetch_comments_query = "SELECT * FROM commento WHERE document_id = $document_id LIMIT $commentsPerPage OFFSET $offset";
$comments_result = mysqli_query($conn, $fetch_comments_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document Details</title>
<link rel="stylesheet" href="../filedesign/docs.css">
<style>
  .rating input[type="radio"] {
    display: none;
  }

  .rating label {
    color: #ccc;
    cursor: pointer;
    font-size: 40px;
  }

  .rating label:hover,
  .rating label:hover ~ label {
    color: #ff0; /* Yellow color */
 
  }

  .rating input[type="radio"]:checked ~ label,
  .rating label:hover ~ input[type="radio"]:checked ~ label {
    color: #ff0; /* Yellow color */
  }
</style>
</head>
<body>
<div class="document-details">
  <h1><?php echo $document_title; ?></h1>
  <!-- Document Preview -->
  <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $document_title; ?>">
  
  <!-- Rating and Comment Section -->
  <div class="rate-comment-section">
    <form action="" method="post">
      <div class="rating">
        <!-- Rating Section -->
        <input type="hidden" name="document_id" value="<?php echo $document_id; ?>"> <!-- Add document ID -->
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5">&#9733;</label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4">&#9733;</label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3">&#9733;</label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2">&#9733;</label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1">&#9733;</label>
      </div>
      <!-- Comment Section -->
      <div class="comments">
        <textarea name="comment_text" rows="1" cols="50" placeholder="Leave a comment"></textarea><br>
      </div>
      <input type="submit" name="submit" value="Submit">
    </form>
    <div class="comments">
      <!-- Comments/Reviews -->
      <h2>Comments</h2>
      <?php
      // Set the timezone to Philippines
      date_default_timezone_set('Asia/Manila');
      while ($comment_row = mysqli_fetch_assoc($comments_result)) {
          echo '<div class="comment">';
          echo '<p>' . $comment_row['comment_text'] . '</p>';
          echo '<p>Rating: ' . $comment_row['rating'] . '</p>';
          // Convert timestamp to DateTime object
          $comment_date = new DateTime($comment_row['comment_date']);
          // Format the DateTime object as per your requirement
          echo '<p>Comment Date: ' . $comment_date->format('Y-m-d H:i:s') . '</p>';
          echo '</div>';
      }
      ?>
    </div>
    <?php
    // Add pagination links
    $total_comments_query = "SELECT COUNT(*) AS total_comments FROM commento WHERE document_id = $document_id";
    $total_comments_result = mysqli_query($conn, $total_comments_query);
    $total_comments_row = mysqli_fetch_assoc($total_comments_result);
    $total_comments = $total_comments_row['total_comments'];
    $total_pages = ceil($total_comments / $commentsPerPage);

    if ($total_pages > 1) {
        echo "<div class='pagination'>";
        if ($current_page > 1) {
            echo "<a href='?doc_id=$document_id&page=" . ($current_page - 1) . "'>Previous</a>";
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?doc_id=$document_id&page=$i'>$i</a>";
        }
        if ($current_page < $total_pages) {
            echo "<a href='?doc_id=$document_id&page=" . ($current_page + 1) . "'>Next</a>";
        }
        echo "</div>";
    }
    ?>
  </div>
  <br>
  <!-- Back button -->
    <div class="back-button">
        <a href="javascript:history.go(-1)">Back</a>
    </div>
</div>
</body>
</html>
