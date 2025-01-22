<?php
// Create a new MySQLi connection
$con = new mysqli('localhost', 'root', '', 'backend_testing');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MenuData</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
  .custom-form {
    border: 2px solid #007bff;
    /* Blue border */
    border-radius: 10px;
    /* Rounded corners */
    padding: 20px;
    /* Padding inside the form */
  }
</style>

<body>

  <div class="container">
    <div class="row mt-5">
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu with Submenu</title>
        <style>
          /* Basic Styles */
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
          }

          nav {
            background-color: red;
          }

          ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
          }

          li {
            position: relative;
          }

          a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 20px;
          }

          a:hover {
            background-color: red;
            color: white;
          }

          /* Submenu styles */
          .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #444;
            min-width: 150px;
          }

          .submenu li {
            width: 100%;
          }

          .submenu a {
            padding: 10px;
          }

          li:hover .submenu {
            display: block;
          }
        </style>
      </head>

      <body>
        <nav>
          <ul>
            <?php
            $select = "SELECT * FROM `menudata` ";
            $result = $con->query($select);
            while ($row = $result->fetch_assoc()) {
            ?>
              <li>
                <a href="#"><?php echo $row['text'] ?></a>
                <ul class="submenu">
                  <?php
                  $menuid = $row['menuid'];
                  $select_sub = "SELECT * FROM `submenudata` WHERE menuid = '$menuid'";
                  $res_sub = $con->query($select_sub);
                  while ($sub = $res_sub->fetch_assoc()) {
                  ?>
                    <li><a href="#"><?php echo $sub['text']; ?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </li>

            <?php
            }
            ?>

          </ul>
        </nav>
      </body>

      </html>

    </div>
   
  </div>
</body>

</html>