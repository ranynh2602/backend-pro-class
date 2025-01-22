<?php
//include './Conetion1.php';

$con = new mysqli('localhost', 'root', '', 'backend_testing');

//fetch_assoc Data 
$data = "SELECT * FROM `admin` ";
$result_data = $con->query($data);

//update
$id = '';
$username = '';
$password = '';
$position = '';
$date = '';
if (isset($_GET['id']) && $_GET['id'] != null) {
  $id = $_GET['id'];
  $select = 'SELECT * FROM `admin` WHERE id = "' . $id . '";';
  $result_select = $con->query($select);
  $data_select = $result_select->fetch_assoc();

  $id = $data_select['id'];
  $username = $data_select['username'];
  $position = $data_select['position'];
  $data = $data_select['date'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InsertData</title>
  <!--boostrap-->
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
    <div class="row mt-5 ">
      <h3>InsertData </h3>
      <div class="col-md-6 ">
        <img style="width: 100%; height: 100%; object-fit: cover;" src="./img/forms-concept-illustration_114360-4957.jpg" alt="">

      </div>
      <div class="col-md-6 mt-5">



        <form action="./ConnetionCode.php" method="post" class="custom-form">
          <?php echo '<input type="hidden" name="id" value="' . $id . '">'; ?>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input value="<?php echo $username; ?>" type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input value="<?php echo $password; ?>" type="text" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Position</label>
            <input value="<?php echo $position; ?>" type="text" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date</label>
            <input value="<?php echo $date; ?>" type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <input style="background-color: blue ; color: white; outline: none;border:none; padding:5px 20px; border-radius: 3px;" type="submit" name="btn_save" value="Save" />
          <input style="background-color: green ; color: white; outline: none;border:none; padding:5px 20px; border-radius: 3px;" type="submit" name="btn_edit" value="Edit" />

        </form>

      </div>


    </div>
    <div class="row mt-4">
      <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Position</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result_data->fetch_assoc()) { ?>
            <tr>
              <th scope="row"><?php echo $row['id'] ?></th>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['password'] ?></td>
              <td><?php echo $row['position'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td>
                <a href="./InsertData.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                <a href="./InsertData.php?id=<?php echo $row['id']; ?>&action=update" class="btn btn-warning btn-sm">Edit</a>
                <a href="./ConnetionCode.php?id=<?php echo $row['id']; ?>&action=delete" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</body>

</html>