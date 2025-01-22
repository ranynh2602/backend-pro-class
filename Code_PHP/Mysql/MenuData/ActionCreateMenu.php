<?php
// Create a new MySQLi connection
$con = new mysqli('localhost', 'root', '', 'backend_testing');

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Ensure data is retrieved correctly
$menuID = $_POST['menuid'] ?? null;
$text = $_POST['text'] ?? null;
$st = $_POST['status'] ?? null;

if (isset($_POST['btn_save'])) {
    // Check if all required fields are filled
    if ($menuID  && $text  && $st ) {
        // Use a prepared statement to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO `menudata` (menuID, text, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $menuID, $text, $st);

        // Execute and check for errors
        if ($stmt->execute()) {
            echo "Menu data saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}

// Close the connection
$con->close();
