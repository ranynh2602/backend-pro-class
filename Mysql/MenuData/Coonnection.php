<?php
// Create a new MySQLi connection
$con = new mysqli('localhost', 'root', '', 'backend_testing');

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


?>