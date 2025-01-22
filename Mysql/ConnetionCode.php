<?php

$con = new mysqli('localhost', 'root', '', 'backend_testing');

// Check database connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Initialize $result to avoid undefined variable errors
$result = null;

// Retrieve data from the POST request
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$position = $_POST['position'] ?? null;
$date = $_POST['date'] ?? null;
$id = $_POST['id'] ?? null; // Retrieve id for the update query

// Retrieve data from the POST request update 
$uname = $_POST['username'] ?? null;
$upassword = $_POST['password'] ?? null;
$uposition = $_POST['position'] ?? null;
$udate = $_POST['date'] ?? null;

//delete data 


if (isset($_POST['btn_save'])) {
  // Use prepared statements for the insert query
  $stmt = $con->prepare("INSERT INTO `admin`(`username`, `password`, `position`, `date`) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $username, $password, $position, $date);
  if ($stmt->execute()) {
    $result = true; // Action success
    echo "Record saved successfully!";
  } else {
    $result = false; // Action failed
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
}

if (isset($_POST['btn_edit'])) {
  // Ensure this is retrieved properly
  $uid = $_POST['id'] ?? null;
  if ($uid) {
    $update = "UPDATE `admin` SET `username`='$uname', `password`='$upassword', `position`='$uposition', `date`='$udate' WHERE `id`='$uid'";
    if ($con->query($update)) {
      $result = true; // Action success
      echo "Record updated successfully!";
    } else {
      $result = false; // Action failed
      echo "Error: " . $con->error;
    }
  } else {
    $result = false;
    echo "No ID provided for update.";
  }
}
if (isset($_GET['action']) && $_GET['action'] == "delete") {
  // Assuming you want to delete the record with the given ID, ensure to get the correct ID
  $deleteId = $_GET['id'] ?? null;  // Fetch the ID for deletion
  if ($deleteId) {
    $delete = "DELETE FROM `admin` WHERE id = ?";
    $stmt = $con->prepare($delete);
    $stmt->bind_param("i", $deleteId);
    if ($stmt->execute()) {
      echo "Record deleted successfully!";
    } else {
      echo "Error: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "No ID provided for deletion.";
  }
}

// Close the connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Status</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <?php if ($result === true) : ?>
      <!-- Success Alert -->
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Data has been inserted/updated successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <a href="InsertData.php" class="btn btn-primary">Back to Insert Form</a>
    <?php elseif ($result === false) : ?>
      <!-- Error Alert -->
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Query failed: <?= $con->error; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <a href="InsertData.php" class="btn btn-danger">Try Again</a>
    <?php else : ?>
      <!-- No Action Taken -->
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Notice!</strong> No action taken.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <a href="InsertData.php" class="btn btn-secondary">Back</a>
    <?php endif; ?>
  </div>

  <!-- Bootstrap JS (Optional for Dismiss Button) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
