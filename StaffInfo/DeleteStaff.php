<?php 
include "./config.php";

if (isset($_GET['code']) && !empty($_GET['code'])) {
    // Sanitize the input
    $id = $con->real_escape_string($_GET['code']);

    // Correct the SQL query
    $delete = "DELETE FROM `staff` WHERE `code` = '$id'";

    // Execute the query
    $res = $con->query($delete);

    // Check the result
    if ($res && $con->affected_rows > 0) {
        // Redirect to the index page after successful deletion
        header("Location: index.php?status=success");
        exit(); // Ensure no further code is executed
    } else {
        // Handle the case where the record does not exist or an error occurred
        echo "Error deleting record: " . ($con->affected_rows === 0 ? "No matching record found." : $con->error);
    }
} else {
    echo "Invalid or missing code parameter.";
}
