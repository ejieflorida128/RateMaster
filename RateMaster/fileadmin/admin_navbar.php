
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Include Ion icons CSS -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        /* CSS for navbar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            overflow: hidden;
            margin-right: 50px;
            margin-left: 50px;
            margin-top: 10px;
        }
        .navbar a {
            float: left;
            display: block;
            color: #007bff; /* Blue color for text */
            text-align: center;
            padding: 10px 20px; /* Adjust padding */
            text-decoration: none;
            border: 1px solid #007bff; /* Blue border */
            border-radius: 5px; /* Rounded corners */
            margin-right: 10px; /* Spacing between items */
        }
        .navbar a ion-icon {
            margin-right: 5px; /* Adjust spacing between icon and text */
            color: blue;
        }
        .navbar a:hover {
            background-color: #007bff; /* Blue background color on hover */
            color: white; /* White text color on hover */
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
    <a href="file_admin.php"><ion-icon name="bar-chart"></ion-icon> Dashboard</a>
    <a href="fileadmin/document_management.php"><ion-icon name="document"></ion-icon> Document Management</a>
    <a href="rating_management.php"><ion-icon name="star"></ion-icon> Rating Management</a>
    <a href="activity_logs.php"><ion-icon name="clipboard"></ion-icon> Activity Logs</a>
    <a href="user_management.php"><ion-icon name="people"></ion-icon> User Management</a>
    <a href="notification.php"><ion-icon name="notifications"></ion-icon> Notification System</a>
    <a href="index.php"><ion-icon name="notifications"></ion-icon>Logout</a>
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
