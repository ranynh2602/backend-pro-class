<?php
// Create a new MySQLi connection
$con = new mysqli('localhost', 'root', '', 'backend_testing');

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve POST data safely
$submenuId = $_POST['submenuId'] ?? null;
$text = $_POST['text'] ?? null;
$st = $_POST['status'] ?? null;
$menuid = $_POST['menuid'] ?? null;
$link = $_POST['link'] ?? null;

if (isset($_POST['btn_save'])) {
    // Check if all required fields are filled
    if ($submenuId && $text && $st && $menuid) {
        // Use a prepared statement to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO `submenudata` (`submenuId`, `text`, `menuid`, `status`, `link`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $submenuId, $text, $menuid, $st, $link);

        // Execute and check for errors
        if ($stmt->execute()) {
            echo "Menu data saved successfully!";
        } else {
            if ($con->errno === 1062) { // Duplicate entry error code
                echo "Error: Duplicate submenuId. Please use a unique ID.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}

// Close the connection
$con->close();
?>
