<?php
include("../connection.php");
include("build_sidebar.php");


// Count total number of uploaded images
$query = "SELECT COUNT(*) AS total_images FROM buildings";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_images = $row['total_images'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Building Overview</title>
<link rel="stylesheet" href="../buildrate/build_design/overview.css">
</head>
<body>

<div class="overview">
    <h1>Buildings </h1>
    <p>Total Uploaded   : <?php echo $total_images; ?></p>
</div>

</body>
</html>
