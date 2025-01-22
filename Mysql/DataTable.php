<?php

$con = new mysqli('localhost', 'root', '', 'backend_testing');
$data = "SELECT * FROM `admin` ";
$result = $con->query($data);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataTable</title>
  <!--boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <h3>DataTable</h3>
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">position</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <th scope="row"><?php echo $row['id'] ?></th>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['position'] ?></td>
              <td><?php echo $row['date'] ?></td>
              
            </tr>
          <?php

          }

          ?>


        </tbody>
      </table>
    </div>
  </div>

</body>

</html>