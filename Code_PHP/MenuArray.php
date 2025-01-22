<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  .menu {
    width: 700px;
    background-color: red;

  }
  ul{
    list-style: none;
    display: flex;
  }
  li{
    list-style-type: none;
    display: flex;
  }
  a{
    margin: 5px 5px ;
    text-decoration: none;
    color: white;
    font-size: 20px;
  }
</style>

<body>
  <div class="menu">
    <ul>
      <?php
        $menu = array(

          array('menu' => "Html", 'link' => "https://www.w3schools.com/html/default.asp"),
          array('menu' => "Css", 'link' => "https://www.w3schools.com/css/default.asp"),
          array('menu' => "Js", 'link' => "https://www.w3schools.com/js/default.asp"),
          array('menu' => "Php", 'link' => "https://www.w3schools.com/js/default.asp"),

        );
        foreach ($menu as $val){
          ?>
                <li><a href="<?php echo $val['link'] ?>"><?php echo $val['menu'] ?></a></li>

          <?php

        }
      ?>
      

     
    </ul>
  </div>
</body>

</html>