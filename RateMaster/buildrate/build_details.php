<?php
include("../connection.php");
include("build_sidebar.php");

// Set the number of comments per page
$commentsPerPage = 2;

// Retrieve building details from the database
if(isset($_GET['building_id'])) {
    $building_id = $_GET['building_id'];
    $query = "SELECT * FROM buildings WHERE building_id = $building_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $building_title = $row['title'];
        $thumbnail_url = $row['thumbnail_url'];
        // You can fetch other building details as needed
    } else {
        // Handle case when building ID is not found
        echo "Building not found.";
        exit(); // Stop execution if building ID is invalid
    }
} else {
    // Handle case when building ID is not provided
    echo "Building ID is required.";
    exit(); // Stop execution if building ID is not provided
}

// Handle form submission
if(isset($_POST["submit"])) {
    $user_id = 1; // Assuming user ID 1 for demonstration, you should replace this with actual user ID
    if(isset($_POST["rating"])) {
        // Handle rating submission
        $rating = $_POST["rating"];
        // Perform database update or insertion for rating with current timestamp
        $insert_rating_query = "INSERT INTO building_ratings (building_id, user_id, rating, rating_date) VALUES ($building_id, $user_id, $rating, NOW())";
        if(mysqli_query($conn, $insert_rating_query)) {
            echo "Rating inserted successfully.";
            // Update buildings table with new rating (assuming you have a rating field in buildings table)
            $update_building_query = "UPDATE buildings SET rating = $rating WHERE building_id = $building_id";
            mysqli_query($conn, $update_building_query);
        } else {
            echo "Error inserting rating: " . mysqli_error($conn);
        }
    }
    if(isset($_POST["comment_text"])) {
        // Handle comment submission
        $comment_text = $_POST["comment_text"];
        // Perform database insertion for comment with current timestamp
        // Make sure $rating is defined here
        $rating = isset($rating) ? $rating : 0; // Set default rating if not provided
        $insert_comment_query = "INSERT INTO building_comments (building_id, user_id, comment_text, comment_date, rating, rating_date) VALUES ($building_id, $user_id, '$comment_text', NOW(), $rating, NOW())";
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

// Fetch comments from the database for this building with pagination
$fetch_comments_query = "SELECT * FROM building_comments WHERE building_id = $building_id LIMIT $commentsPerPage OFFSET $offset";
$comments_result = mysqli_query($conn, $fetch_comments_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Building Details</title>
<link rel="stylesheet" href="../buildrate/build_design/build_details.css">

</head>
<body>

<div class="building-details">
  <h1><?php echo $building_title; ?></h1>
  <!-- Building Thumbnail -->
  <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $building_title; ?>">
  
  <!-- Rating and Comment Section -->
  <div class="rate-comment-section">
    <form action="" method="post">
      <div class="rating">
        <!-- Rating Section -->
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
      while ($comment_row = mysqli_fetch_assoc($comments_result)) {
          echo '<div class="comment">';
          echo '<p>' . $comment_row['comment_text'] . '</p>';
          echo '<p>Rating: ' . $comment_row['rating'] . '</p>';
          echo '<p>Comment Date: ' . $comment_row['comment_date'] . '</p>';
          echo '</div>';
      }
      ?>

    </div>
    <?php
    // Add pagination links
    $total_comments_query = "SELECT COUNT(*) AS total_comments FROM building_comments WHERE building_id = $building_id";
    $total_comments_result = mysqli_query($conn, $total_comments_query);
    $total_comments_row = mysqli_fetch_assoc($total_comments_result);
    $total_comments = $total_comments_row['total_comments'];
    $total_pages = ceil($total_comments / $commentsPerPage);

    if ($total_pages > 1) {
        echo "<div class='pagination'>";
        if ($current_page > 1) {
            echo "<a href='?building_id=$building_id&page=" . ($current_page - 1) . "'>Previous</a>";
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?building_id=$building_id&page=$i'>$i</a>";
        }
        if ($current_page < $total_pages) {
            echo "<a href='?building_id=$building_id&page=" . ($current_page + 1) . "'>Next</a>";
        }
        echo "</div>";
    }
    ?>
  </div>
  <!-- Back button -->
  <br>
  <div class="back-button">
      <a href="javascript:history.go(-1)">Back</a>
  </div>
</div>

</body>
</html>
