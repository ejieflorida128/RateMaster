<?php
include("../connection.php");
include("file_sidebar.php");

// Function to fetch document types
function fetchDocumentTypes($conn) {
    $sql = "SELECT DISTINCT file_type FROM document";
    $result = mysqli_query($conn, $sql);
    
    $types = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row['file_type'];
    }
    
    return $types;
}

// Fetch total ratings
$queryTotalRatings = "SELECT SUM(rating) AS total_ratings FROM rating";
$resultTotalRatings = mysqli_query($conn, $queryTotalRatings);
$rowTotalRatings = mysqli_fetch_assoc($resultTotalRatings);
$totalRatings = $rowTotalRatings['total_ratings'];

// Fetch rating distribution
$ratingsDistribution = [];
for ($i = 1; $i <= 5; $i++) {
    $queryRatingCount = "SELECT COUNT(*) AS rating_count FROM rating WHERE rating = $i";
    $resultRatingCount = mysqli_query($conn, $queryRatingCount);
    $rowRatingCount = mysqli_fetch_assoc($resultRatingCount);
    $ratingsDistribution[$i] = $rowRatingCount['rating_count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileRating Overview</title>
    <link rel="stylesheet" href="../filedesign/filerate.css">
    <!-- Add chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add styles for chart container */
        #ratingsChartContainer {
            width: 100%;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<!-- Ratings Overview Section -->
<div class="main-content">
    <h2>Welcome to File Ratings Overview</h2>
    <div id="ratingsChartContainer">
        <canvas id="ratingsChart"></canvas>
    </div>
    <p>Total Ratings: <?php echo $totalRatings; ?></p>
    
    <!-- Simple Insight -->
    <div id="ratingsInsight">
        <?php
        // Find the most common rating
        $maxRating = array_keys($ratingsDistribution, max($ratingsDistribution))[0];
        echo "<p>The most common rating is $maxRating stars.</p>";
        
        // Calculate the average rating
        $totalReviews = array_sum($ratingsDistribution);
        $averageRating = $totalReviews > 0 ? ($ratingsDistribution[1] + 2 * $ratingsDistribution[2] + 3 * $ratingsDistribution[3] + 4 * $ratingsDistribution[4] + 5 * $ratingsDistribution[5]) / $totalReviews : 0;
        echo "<p>The average rating is " . number_format($averageRating, 1) . " stars.</p>";
        ?>
    </div>
</div>


<!-- Script to create the ratings chart -->
<script>
    // Get ratings distribution data from PHP
    var ratingsData = <?php echo json_encode($ratingsDistribution); ?>;

    // Create a bar chart using Chart.js
    var ctx = document.getElementById('ratingsChart').getContext('2d');
    var ratingsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
            datasets: [{
                label: 'Number of Ratings',
                data: Object.values(ratingsData),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Your existing code -->

</body>
</html>
