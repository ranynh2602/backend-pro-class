<?php

$con = new mysqli('localhost','root','','backend_testing');
// Insert query
$insert = "INSERT INTO `admin` (`id`, `username`, `password`, `position`, `date`) 
           VALUES (100, 'admin4', 1457, 'D', '2024-11-13 15:03:04')";

//$result = $con->query($insert);

//delete 
$delete = "DELETE FROM admin WHERE id = 1009";

//update 
$update = "UPDATE `admin` SET `id`=10,`username`='admin_update',`password`=123,`position`='D',`date`='11/23/24' WHERE id = 1008";

$result  = $con->query($update);

// fetch assoc data 
$data = "SELECT * FROM `admin`";
$data = $con->query($data);
while($row = $data->fetch_assoc()){
      echo $row['username']. "<br>";
}


if($result){
      ?>
            <!--<script>alert('Update Success!')</script>-->
      <?php
}

if($con){
      echo "Succes!!!";
}


?>