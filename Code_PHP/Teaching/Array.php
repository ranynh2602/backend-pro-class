<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .box {
      width: 200px;
      height: 200px;
      background-color: red;
      float: left;
      margin: 5px 5px;
      font-size: 30px;
      margin-top: 30px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .menu {
      width: 700px;
      background-color: red;
      padding: 10px;
    }

    .menu ul {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .menu ul li {
      margin: 5px 10px;
    }

    .menu ul li a {
      font-size: 20px;
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>

  <div class="menu">
    <ul>
      <?php
      $color = array('yellow', 'green', 'blue', 'black');
      echo $color[0];


      $arrayLength = count($color);
      for ($i = 0; $i < $arrayLength; $i++) {
      ?>
        <li><a style="color : <?php echo $color[$i]; ?>" href="#"><?php echo $color[$i] ?></a></li>

      <?php
      }
      ?>

    </ul>
  </div>

  <br><br>

  <?php
  //Associative_Array.php
  $colors = array('red', 'green', 'blue', 'pink', 'black');
  foreach ($colors as $index => $color) {
  ?>
    <div style="background-color: <?php echo $color; ?>;" class="box"><?php echo $index; ?></div>

  <?php
  }
  $car = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
  // echo $car['model']; 
  foreach ($car as $key => $val) {
    echo $key . '=' . $val . "<br>";
  }
  ?>
</body>

</html>