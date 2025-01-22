<?php
include "./Config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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

  .custom-button {
    background-color: blue;
    color: white;
    border: none;
    padding: 5px 20px;
    border-radius: 3px;
  }

  .custom-button-green {
    background-color: green;
  }
</style>

<body>
  <div class="container">
    <div class="row mt-5">
      <h3>Create Staff Information</h3>
      <div class="col-md-12 mt-3">
        <form action="./Action.php" method="post" class="custom-form" enctype="multipart/form-data">
          <?php echo '<input type="hidden" name="id" value="">'; ?>

          <!-- First Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="code" class="form-label">Code</label>
              <input type="text" name="code" class="form-control" id="code">
            </div>
            <div class="col-md-6 mb-3">
              <label for="empName" class="form-label">Employee Name</label>
              <input type="text" name="empName" class="form-control" id="empName">
            </div>
          </div>

          <!-- Second Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="position" class="form-label">Position</label>
              <?php
              // SQL query to fetch positions from the database
              $select_position = "SELECT `code`, `posetion_name` FROM `tbl_posetion`";
              $result_position = $con->query($select_position);

              // Check if the query returned results
              if ($result_position && $result_position->num_rows > 0) {
                echo '<select class="form-select" id="position" name="posetion" required>';
                echo '<option value="" disabled selected>Select a position</option>';

                // Fetch each row and populate the options
                while ($row = $result_position->fetch_assoc()) {
                  echo '<option name="posetion"  value="' . $row['code'] . '">' . htmlspecialchars($row['posetion_name']) . '</option>';
                }

                echo '</select>';
              } else {
                // If no positions are found, display a message
                echo '<select class="form-select" id="position" name="position" required>';
                echo '<option value="" disabled selected>No positions available</option>';
                echo '</select>';
              }
              ?>
            </div>
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select name="gender" class="form-control" id="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>

          <!-- Third Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="department" class="form-label">Department</label>
              <?php
              // SQL query to fetch departments from the database
              $select_department = "SELECT `code`, `depatment_name` FROM `tbl_depatment`"; // Correct table and column names
              $result_department = $con->query($select_department);

              // Check if the query returned results
              if ($result_department && $result_department->num_rows > 0) {
                echo '<select class="form-select" id="department" name="department" required>';
                echo '<option value="" disabled selected>Select a department</option>';

                // Fetch each row and populate the options
                while ($row = $result_department->fetch_assoc()) {
                  echo '<option value="' . $row['code'] . '">' . htmlspecialchars($row['depatment_name']) . '</option>';
                }

                echo '</select>';
              } else {
                // If no departments are found, display a message
                echo '<select class="form-select" id="department" name="department" required>';
                echo '<option value="" disabled selected>No department available</option>';
                echo '</select>';
              }
              ?>
            </div>
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">Branch</label>
              <select name="branch" class="form-control" id="branch">
                <?php
                $select_branch = "SELECT * FROM `tbl_branch`";
                $branch_result = $con->query($select_branch);
                while ($branch = $branch_result->fetch_assoc()) {
                ?>
                  <option value=""><?php echo $branch['branch_name'] ?></option>

                <?php
                }


                ?>


              </select>
            </div>


          </div>

          <div class="row">

            <!--<div class="col-md-6 mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" name="photo" class="form-control" id="photo">
            </div>-->
          </div>
          <!-- Fourth Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" name="date" class="form-control" id="date">
            </div>

            <div class="col-md-6 mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" accept="image/*" name="photo" class="form-control" id="photo" onchange="previewImage(event)">
              <img id="preview" src="#" alt="Image Preview" style="max-width: 100%; display: none; border: 1px solid #ddd; padding: 5px;" />
            </div>

          </div>

          <!-- Buttons -->
          <div class="row mt-3">
            <div class="col-md-6">
              <button type="submit" name="btn_save" class="custom-button">Save</button>
              <button type="submit" name="btn_edit" class="custom-button custom-button-green">Edit</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
<script>
  // JavaScript to handle image preview
  function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0]; // Get the selected file

    if (file) {
      const reader = new FileReader(); // FileReader to read the file

      reader.onload = function(e) {
        preview.src = e.target.result; // Set the preview image src
        preview.style.display = 'block'; // Make the preview visible
      };

      reader.readAsDataURL(file); // Read the file as a data URL
    } else {
      preview.style.display = 'none'; // Hide the preview if no file is selected
    }
  }
</script>