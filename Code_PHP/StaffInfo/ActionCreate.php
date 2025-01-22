<?php
include "./config.php";

// Initialize variables
$empName = '';  
$gender = '';  
$position = ''; 
$department = ''; 
$branch = ''; 
$date = ''; 
$photo = ''; // Initialize photo variable

if (isset($_POST['btn_save'])) {
    // Collect form data
    $empName = $_POST['empName']; 
    $gender = $_POST['gender']; 
    $position = $_POST['position']; 
    $department = $_POST['department']; 
    $branch = $_POST['branch']; 
    $date = $_POST['date']; 
    
    // Handle file upload (photo)
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photoTmp = $_FILES['photo']['tmp_name'];
        $photoName = $_FILES['photo']['name'];
        $photoPath = 'uploads/' . $photoName;  // Save to 'uploads' directory
        
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($photoTmp, $photoPath)) {
            $photo = $photoPath;  // Save the file path
        } else {
            echo "Error uploading the photo.";
        }
    } else {
        echo "No photo uploaded or error in file upload.";
    }

    // Prepare SQL query to insert data
    $sql_insert = "INSERT INTO `staff`(`empName`, `gender`, `posetion`, `department`, `branch`, `photo`, `date`) 
                   VALUES ('$empName','$gender','$position','$department','$branch','$photo','$date')";
    
    // Execute the query
    if ($con->query($sql_insert) === TRUE) {
        header("Location: index.php?status=success");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $sql_insert . "<br>" . $con->error;
    }
    
    // Close the database connection
    $con->close();
}
