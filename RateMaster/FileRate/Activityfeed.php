<?php 
include("../connection.php"); 
include("file_sidebar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Feed</title>
    <link rel="stylesheet" href="../filedesign/activityfeed.css"> <!-- You can create a CSS file for styling -->
</head>
<body>

<div class="container">
    <h1>Activity Feed</h1>
    <div class="activity-feed">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Submission Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Pagination
                $page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number, default is 1
                $records_per_page = 15;
                $offset = ($page - 1) * $records_per_page;
                $count = ($page - 1) * $records_per_page + 1;

                
                // Retrieve activity log entries for the current page, ensuring uniqueness
                $activityQuery = "SELECT DISTINCT file_name, file_rating, file_comment, submission_time 
                FROM activity_log 
                GROUP BY file_name, file_rating, file_comment, submission_time 
                ORDER BY submission_time DESC 
                LIMIT $offset, $records_per_page"; 
                $activityResult = mysqli_query($conn, $activityQuery);

                // Total number of records (distinct)
                $total_records_query = "SELECT COUNT(DISTINCT file_name, file_rating, file_comment, submission_time) AS total_records FROM activity_log";
                $total_records_result = mysqli_query($conn, $total_records_query);
                $total_records = mysqli_fetch_assoc($total_records_result)['total_records'];
                $total_pages = ceil($total_records / $records_per_page);

                if (mysqli_num_rows($activityResult) > 0) {
                    while ($row = mysqli_fetch_assoc($activityResult)) {
                        echo "<tr>";
                        echo "<td>{$count}</td>";
                        echo "<td>{$row['file_name']}</td>";
                        echo "<td>{$row['file_rating']}</td>";
                        echo "<td>{$row['file_comment']}</td>";
                        echo "<td>{$row['submission_time']}</td>";
                        echo "</tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No activity found.</td></tr>";
                }
                // Close database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        
        <!-- Pagination links -->
        <?php if ($total_pages > 1): ?>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" <?php if ($page == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
                
                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?php echo $page + 1; ?>">Next</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
