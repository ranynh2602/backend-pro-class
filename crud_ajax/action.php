<?php
// Database connection
$con = new mysqli('localhost', 'root', '', 'backend_testing');

// Check connection
if ($con->connect_error) {
    die('Connection failed: ' . $con->connect_error);
}

// Get POST data
$action = isset($_POST['action']) ? $_POST['action'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : null;

// Handle different actions
if ($action === 'insert') {
    // Insert data into the database
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];

    $stmt = $con->prepare("INSERT INTO `tbl_product`(`id`, `proName`, `proQty`, `proPrice`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isid", $id, $name, $qty, $price);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Record inserted successfully!"]);
    } else {
        echo json_encode(["error" => $stmt->error]);
    }
    $stmt->close();

} elseif ($action === 'delete') {
    // Delete data from the database
    if ($id) {
        $stmt = $con->prepare("DELETE FROM `tbl_product` WHERE `id` = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Record deleted successfully!"]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "Missing ID for delete action."]);
    }

} elseif ($action === 'update') {
    // Update data in the database
    if ($id) {
        $name = $_POST['name'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];

        $stmt = $con->prepare("UPDATE `tbl_product` SET `proName` = ?, `proQty` = ?, `proPrice` = ? WHERE `id` = ?");
        $stmt->bind_param("sidi", $name, $qty, $price, $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Record updated successfully!"]);
        } else {
            echo json_encode(["error" => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "Missing ID for update action."]);
    }

} else {
    echo json_encode(["error" => "Invalid action."]);
}

// Close the database connection
$con->close();
?>
