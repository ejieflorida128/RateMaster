<?php
$host = 'localhost';
$dbname = 'ratings';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$connForEjie = mysqli_connect("sql6.freemysqlhosting.net","sql6687267","eLAteT4TJg","sql6687267");
?>
