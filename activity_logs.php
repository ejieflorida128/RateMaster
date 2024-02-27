<?php include "connection.php" ?>
<?php include "side/ad_sidebar.php" ?>

<!DOCTYPE html>
<html>
<head>
    <title>Activity Logs</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h2>Activity Logs</h2>

<!-- Form to add a new activity log -->
<form action="backend.php" method="post">
    <h3>Add New Activity Log:</h3>
    <label for="user_id">User ID:</label><br>
    <input type="text" id="user_id" name="user_id"><br>
    <label for="action">Action:</label><br>
    <input type="text" id="action" name="action"><br><br>
    <input type="submit" value="Add Activity Log">
</form>

<hr>

<!-- Form to delete an activity log -->
<form action="backend.php" method="post">
    <h3>Delete Activity Log:</h3>
    <label for="delete_id">Log ID:</label><br>
    <input type="text" id="delete_id" name="delete_id"><br><br>
    <input type="submit" value="Delete Activity Log">
</form>

</body>
</html>
