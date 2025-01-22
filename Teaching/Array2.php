<!--PHP - Multidimensional Arrays-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
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

<body>
 
  <div class="menu">
    <ul>
      <?php



      $menu = array(
        //sub array

        array('menu' => "HTML", "Link" => "https://www.w3schools.com/html/default.asp"),
        array('menu' => "CSS", "Link" => "https://www.w3schools.com/css/default.asp"),
        array('menu' => "JAVASCRIPT", "Link" => "https://www.w3schools.com/js/default.asp"),

      );



      foreach ($menu as $val) {
      ?>
        <li><a href="<?php echo $val['Link'] ?>"><?php echo $val['menu'] ?></a></li>

      <?php
        //echo $val['menu'] . "=" . $val['Link'] . "<br>";
      }
      ?>

    </ul>
  </div>

</body>

</html>