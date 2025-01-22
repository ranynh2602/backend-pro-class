<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "backend_testing";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$code = $empName = $position = $gender = $department = $branch = $date = $filename = '';

if (isset($_POST['btn_save'])) {
    $code = $con->real_escape_string($_POST['code']);
    $empName = $con->real_escape_string($_POST['empName']);
    $position = $con->real_escape_string($_POST['posetion']);
    $department = $con->real_escape_string($_POST['department']);
    $branch = $con->real_escape_string($_POST['branch']);
    $date = $con->real_escape_string($_POST['date']);
    $photo = $_FILES['photo']['name'];

    $photoPath = 'uploads/' . basename($photo);
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
        $insertQuery = "INSERT INTO staff 
                        (code, empName, posetion, department, branch, date, photo) 
                        VALUES ('$code', '$empName', '$position', '$department', '$branch', '$date', '$photo')";

        if ($con->query($insertQuery)) {
            header("Location: index.php?status=success");
            exit(); // Ensure no further code is executed
        } else {
            echo "Error: " . $con->error;
        }
    } else {
        echo "Failed to upload photo.";
    }
}
?>

