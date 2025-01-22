<?php
// Database connection details
$servername = "localhost"; // Change to your server name
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "backend_testing"; // Replace with your database name

// Create a connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if (!$con) {
  die('Database connection failed: ' . mysqli_connect_error());
}

//echo "Connected successfully";

// Close the connection (optional, handled automatically at the end of the script)
//$con->close();

?>