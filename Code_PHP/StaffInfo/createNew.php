<?php include "./config.php" ?>

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
        <form action="./ActionCreate.php" method="post" class="custom-form" enctype="multipart/form-data">
          <?php echo '<input type="hidden" name="id" value="">'; ?>

          <!-- First Row -->
          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="position" class="form-label">Position</label>
              <select name="position" class="form-control" id="position">
                <option value="">Select Position</option>
                <?php
                $selct_position = "SELECT * FROM `tbl_posetion`";
                $res_op = $con->query($selct_position);
                while ($posi = $res_op->fetch_assoc()) {
                ?>
                  <option  value="<?php echo $posi['posetion_name']; ?>"><?php echo $posi['posetion_name']; ?></option>
                <?php
                }
                ?>
              </select>

            </div>

            <div class="col-md-6 mb-3">
              <label for="empName" class="form-label">Employee Name</label>
              <input type="text" name="empName" class="form-control" id="empName">
            </div>
          </div>

          <!-- Second Row -->
          <div class="row">

            <!--<div class="col-md-6 mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" name="photo" class="form-control" id="photo">
            </div>-->
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select name="gender" class="form-control" id="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="department" class="form-label">Department</label>
              <select name="department" class="form-control" id="department">
                <option value="">Select Department</option>
                <?php
                    $select_dep = "SELECT * FROM `tbl_depatment`";
                    $res_dep = $con->query($select_dep);
                    while($dep = $res_dep->fetch_assoc()){
                      ?>
                        <option  value="<?php echo $dep['depatment_name']; ?>"><?php echo $dep['depatment_name']; ?></option>

                      <?php
                    }
                
                
                ?>
              

              </select>
            </div>

          </div>

          <!-- Fourth Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="branch" class="form-label">Branch</label>
              <select name="branch" class="form-control" id="branch_name">
                <option value="">Select Branch</option>
                <?php
                $selct_branch = "SELECT *  FROM `tbl_branch`";
                $res_bra = $con->query($selct_branch);
                while ($branch = $res_bra->fetch_assoc()) {
                ?>
                  <option  value="<?php echo $branch['branch_name']; ?>"><?php echo $branch['branch_name']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="photo" class="form-label">Date</label>
              <input type="date" name="date" class="form-control" id="date">
            </div>

          </div>
          <div class="row">
           

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