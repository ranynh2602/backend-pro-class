<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="./GetMethod.php" method="post">
    <input type="text" name="text">
    <input type="password" name="password">
    <input type="submit" value="Button">
  </form>
  <?php
  $text_name = $_POST['text'];  //post data 
  $text_password = $_POST['password'];  //post data 
  //echo $text_name, $text_password;

  ?>

 
</body>

</html>