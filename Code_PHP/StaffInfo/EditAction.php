<?php
include "./config.php";

if (isset($_POST['btn_edit'])) {
    // Retrieve and sanitize input data
    $empCode = $con->real_escape_string($_POST['code']);
    $empName = $con->real_escape_string($_POST['empName']);
    $gender = $con->real_escape_string($_POST['gender']);
    $position = $con->real_escape_string($_POST['position']);
    $department = $con->real_escape_string($_POST['department']);
    $branch = $con->real_escape_string($_POST['branch']);
    $date = $con->real_escape_string($_POST['date']);

    // Handle the uploaded file
    $photo = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photoName = basename($_FILES['photo']['name']);
        $uploadDir = 'uploads/'; // Directory where files will be uploaded
        $uploadFilePath = $uploadDir . $photoName;

        // Move the uploaded file to the designated directory
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFilePath)) {
            $photo = $uploadFilePath; // Store the file path for saving in the database
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    // Construct the SQL query
    $update = "UPDATE `staff` 
               SET 
                   `empName` = '$empName',
                   `gender` = '$gender',
                   `posetion` = '$position',
                   `department` = '$department',
                   `branch` = '$branch',
                   `date` = '$date'";
    
    // Include the photo update only if a new photo was uploaded
    if ($photo !== null) {
        $update .= ", `photo` = '$photo'";
    }
    
    $update .= " WHERE `code` = '$empCode'";

    // Execute the query
    if ($con->query($update)) {
        // Redirect to the index page with a success message
        header("Location: index.php?status=success");
        exit();
    } else {
        // Handle query failure
        echo "Error updating record: " . $con->error;
    }
} else {
    echo "Invalid request.";
}
