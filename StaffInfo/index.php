<?php include "./config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Information</title>
  <!-- Correct DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container">
    <div class="row mt-4">
      <div class="col-md-6">
        <a href="./createNew.php">
          <button type="button" class="btn btn-primary">Create New</button>

        </a>
      </div>
    </div>
    <div class="row mt-3">
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>code </th>
            <th>empName</th>
            <th>gender</th>
            <th>posetion</th>
            <th>department</th>
            <th>branch</th>
            <th>photo</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!--Display Data -->
          <?php
          $select_staff = "SELECT * FROM `staff`";
          $res = $con->query($select_staff);
          while ($staff = $res->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $staff['code'] ?></td>
              <td><?php echo $staff['empName'] ?></td>
              <td><?php echo $staff['gender'] ?></td>
              <td><?php echo $staff['posetion'] ?></td>
              <td><?php echo $staff['department'] ?></td>
              <td><?php echo $staff['branch'] ?></td>
              <td>
                <img src="<?php echo htmlspecialchars($staff['photo']); ?>" alt="Staff Photo" style="width: 70px; height: auto; object-fit: cover;">
              </td>


              <td>
                <a href=""> <button type="button" class="btn btn-primary btn-sm">View</button></a>
                <a href="./editNew.php?code=<?php echo $staff['code']; ?>&action=update">
                  <button type="button" class="btn btn-success btn-sm">Edit</button>
                </a>

                <!--<a href="./editNew.php echo $staff['code'] ?>&&action='update' "> <button type="button" class="btn btn-success btn-sm">Edit</button></a>-->
                <a href="./DeleteStaff.php?code=<?php echo $staff['code'] ?>&&action='delete'"> <button type="button" class="btn btn-danger btn-sm">Delete</button></a>

              </td>
            </tr>
          <?php

          }
          ?>



        </tbody>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>
<!-- Correct jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>

</html>