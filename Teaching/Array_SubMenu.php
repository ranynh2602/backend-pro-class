<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu with Submenu</title>
  <link rel="stylesheet" href="styles.css">


  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    .menu {
      background-color: red;
    }

    .menu ul {
      list-style: none;
      padding: 0;
      display: flex;
    }

    .menu ul li {
      position: relative;
    }

    .menu ul li a {
      display: block;
      padding: 15px 20px;
      color: white;
      text-decoration: none;
    }

    .menu ul li a:hover {
      background-color: #555;
    }

    .menu .submenu ul {
      position: absolute;
      display: none;
      top: 100%;
      left: 0;
      background-color: #444;
      list-style: none;
      padding: 0;
    }

    .menu .submenu:hover ul {
      display: block;
    }

    .menu .submenu ul li a {
      padding: 10px 20px;
      color: white;
      text-decoration: none;
    }

    .menu .submenu ul li a:hover {
      background-color: #666;
    }
  </style>
</head>

<body>

  <nav class="menu">
    <ul>
      <li><a href="#">Home</a></li>
      <li class="submenu">
        <a href="#">Sub Menu</a>
        <ul>

          <?php
          $object = array(
            $array = array(
              'menu' => "HTML",
              'sub_menu' => array("HTML1", "HTML2", "HTML3"),
            ),
            $array = array(
              'menu' => "Css",
              'sub_menu' => array("CSS1", "CSS2", "CSS3"),
            ),
          );

          foreach ($object as $ob) {
            //echo $ob['sub_menu'][0] . "<br>";

            $sub = $ob['sub_menu'];

            foreach ($sub as $item) {
              //echo $item . "<br>";
              ?>
              <li><a href="#"><?php echo $item; ?></a></li>

              <?php
            }
          }

          ?>
          
        </ul>
      </li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

</body>

</html>