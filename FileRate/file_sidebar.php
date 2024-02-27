<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
    <!-- Include Ion icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.1/css/ionicons.min.css">
    <style>
        /* CSS for navbar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
     
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .content {
            padding: 20px;
        }
        button.toggle {
            background-color: #007bff; /* Blue background color */
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            float: left;
            margin-top: 10px;
            margin-left: 10px;
        }
        @media screen and (max-width: 800px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <!-- Use appropriate Ion icons for each link -->
    <a href="fileratepage.php"><ion-icon name="bar-chart"></ion-icon> Dashboard</a>
    <a href="FileRating.php"><ion-icon name="star"></ion-icon> File Ratings</a>
    <!--<a href="Analytics.php"><ion-icon name="stats"></ion-icon> Analytics</a>-->
    <a href="../logout.php"><ion-icon name="log-out"></ion-icon> Logout</a>
    <button class="toggle" onclick="toggleSidebar()"><ion-icon name="menu"></ion-icon></button>
</div>

<div class="content">
    <!-- Content goes here -->
</div>

<script>
    function toggleSidebar() {
        var navbar = document.querySelector('.navbar');
        var toggleButton = document.querySelector('.toggle');

        if (navbar.style.display === 'block') {
            navbar.style.display = 'none'; // Hide the navbar
            toggleButton.style.marginLeft = '10px'; // Move toggle button to original position
        } else {
            navbar.style.display = 'block'; // Show the navbar
            toggleButton.style.marginLeft = '260px'; // Move toggle button to accommodate navbar
        }
    }
</script>

</body>
</html>
