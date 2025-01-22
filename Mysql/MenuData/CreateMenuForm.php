<?php
// Create a new MySQLi connection
include "./Coonnection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- DataTable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
      <h3>InsertData Menu</h3>

      <div class="col-md-6 mt-5">
        <form action="./ActionCreateMenu.php" method="post" class="custom-form">
          <?php echo '<input type="hidden" name="id" value="">'; ?>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">menuid</label>
            <input type="text" name="menuid" class="form-control" id="exampleInputPassword1">
          </div>


          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">text</label>
            <input type="text" name="text" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">status</label>
            <input type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <input style="background-color: blue; color: white; outline: none; border: none; padding: 5px 20px; border-radius: 3px;" type="submit" name="btn_save" value="Save" />
          <input style="background-color: green; color: white; outline: none; border: none; padding: 5px 20px; border-radius: 3px;" type="submit" name="btn_edit" value="Edit" />
        </form>
      </div>
      <div class="col-md-6 mt-5">
        <form action="./ActionCreateSubMenu.php" method="post" class="custom-form">
          <?php echo '<input type="hidden" name="submenuId" value="">'; ?>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">submenuId</label>
            <input type="text" name="submenuId" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">text</label>
            <input type="text" name="text" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="menuSelect" class="form-label">Menu ID</label>
            <select name="menuid" class="form-control" id="menuSelect">
              <option value="" disabled selected>Select Menu ID</option>
              <?php
              $getMenu = "SELECT * FROM `menudata` WHERE 1"; // Query to fetch menu data
              $re_getMenu = $con->query($getMenu); // Execute the query

              if ($re_getMenu->num_rows > 0) { // Check if there are any rows returned
                while ($datamenu = $re_getMenu->fetch_assoc()) { // Loop through the rows
              ?>
                 <option value="<?php echo $datamenu['menuid']; ?>"><?php echo $datamenu['text'] ?></option>
              <?php
                }
              } else {
                echo '<option value="" disabled>No menus available</option>'; // If no rows found
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">status</label>
            <input type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">link</label>
            <input type="text" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>


          <input style="background-color: blue; color: white; outline: none; border: none; padding: 5px 20px; border-radius: 3px;" type="submit" name="btn_save" value="Save" />
          <input style="background-color: green; color: white; outline: none; border: none; padding: 5px 20px; border-radius: 3px;" type="submit" name="btn_edit" value="Edit" />
        </form>
      </div>
    </div>

    <!-- DataTable -->
    <div class="row mt-5">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>M ID</th>
            <th>M Text</th>
            <th>M Status</th>
            <th>S ID</th>
            <th>S Text</th>

          </tr>
        </thead>

        <tbody>
          <!-- Example data -->

          <?php
          $select = "SELECT 
            M.menuid, M.text As MenusText, M.status,
            S.submenuId, S.text As SText
            FROM menudata M INNER JOIN submenudata S
            ON M.menuid = S.submenuId";
          $result = $con->query($select);
          while ($data = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $data['menuid'] ?></td>
              <td><?php echo $data['MenusText'] ?></td>
              <td><?php echo $data['status'] ?></td>
              <td><?php echo $data['submenuId'] ?></td>
              <td><?php echo $data['SText'] ?></td>
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

          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable({
      paging: true,
      searching: true,
      info: true,
      lengthChange: true // Enables "entries per page" dropdown
    });
  });
</script>

</html>