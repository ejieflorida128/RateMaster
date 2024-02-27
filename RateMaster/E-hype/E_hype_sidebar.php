<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
    <!-- Include Ion icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.1/css/ionicons.min.css">
    <style>
        /* CSS for sidebar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            height: 100%;
            width: 250px; /* Adjusted width to accommodate Ion icons */
            position: fixed;
            top: 0;
            left: 0; /* Fixed position for the sidebar */
            background-color: #007bff; /* Blue background color */
            padding-top: 20px;
            transition: left 0.3s; /* Smooth transition for sliding effect */
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: flex; /* Align icon and text horizontally */
            align-items: center; /* Center items vertically */
        }
        .sidebar a ion-icon {
            margin-right: 10px; /* Adjust spacing between icon and text */
            color: white; /* Set Ion icon color to white */
        }
        .sidebar a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .content {
            margin-left: 250px; /* Adjusted to match the width of the sidebar */
            padding: 20px;
        }
        button.toggle {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #007bff; /* Blue background color */
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            z-index: 999; /* Ensure toggle button appears above sidebar */
        }
    </style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <!-- Use appropriate Ion icons for each link -->
    <a href="E_hypebeastpage.php"><ion-icon name="bar-chart"></ion-icon><span class="icon-text">Dashboard</span></a>
    <a href="E_hypeRate.php"><ion-icon name="star"></ion-icon><span class="icon-text">E-Hypebeast Rate</span></a>
    <!--<a href="Analytics.php"><ion-icon name="stats"></ion-icon>Analytics</a>-->
    <a href="../logout.php"><ion-icon name="log-out"></ion-icon><span class="icon-text">Logout</span></a>
</div>

<div class="content">
    <!-- Content goes here -->
    <button class="toggle" onclick="toggleSidebar()"><ion-icon name="menu"></ion-icon></button>
</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var toggleButton = document.querySelector('.toggle');
        var iconTexts = document.querySelectorAll('.sidebar .icon-text');

        if (sidebar.style.left === '0px') {
            sidebar.style.left = '-250px'; // Hide the sidebar
            toggleButton.style.left = '10px'; // Move toggle button to original position
            iconTexts.forEach(function(iconText) {
                iconText.style.display = 'none'; // Hide icon texts
            });
        } else {
            sidebar.style.left = '0px'; // Show the sidebar
            toggleButton.style.left = '260px'; // Move toggle button to accommodate sidebar
            iconTexts.forEach(function(iconText) {
                iconText.style.display = 'block'; // Show icon texts
            });
        }
    }
</script>

</body>
</html>
