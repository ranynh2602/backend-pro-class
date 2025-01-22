<?php 
include "./config.php";

$staff = [];
if (isset($_GET['code'])) {
    $emcode = $con->real_escape_string($_GET['code']);
    $select = "SELECT * FROM `staff` WHERE code = '$emcode'";
    $res = $con->query($select);
    $staff = $res->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Staff Information</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
  .custom-form {
    border: 2px solid #007bff;
    border-radius: 10px;
    padding: 20px;
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
      <h3>Edit Staff Information</h3>
      <div class="col-md-12 mt-3">
        <form action="./EditAction.php" method="post" class="custom-form" enctype="multipart/form-data">
          <!-- Hidden Input for Staff Code -->
          <input type="hidden" name="code" value="<?php echo $staff['code'] ?? ''; ?>">

          <!-- First Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="position" class="form-label">posetion</label>
              <select name="posetion" class="form-control" id="position">
                <option value="">Select Position</option>
                <?php
                $select_position = "SELECT * FROM `tbl_posetion`";
                $res_op = $con->query($select_position);
                while ($posi = $res_op->fetch_assoc()) {
                  $selected = ($staff['posetion'] ?? '') === $posi['posetion_name'] ? 'selected' : '';
                ?>
                  <option value="<?php echo $posi['posetion_name']; ?>" <?php echo $selected; ?>>
                    <?php echo $posi['posetion_name']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="empName" class="form-label">Employee Name</label>
              <input type="text" name="empName" class="form-control" id="empName" value="<?php echo $staff['empName'] ?? ''; ?>">
            </div>
          </div>

          <!-- Second Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select name="gender" class="form-control" id="gender">
                <option value="">Select Gender</option>
                <option value="male" <?php echo ($staff['gender'] ?? '') === 'male' ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo ($staff['gender'] ?? '') === 'female' ? 'selected' : ''; ?>>Female</option>
                <option value="other" <?php echo ($staff['gender'] ?? '') === 'other' ? 'selected' : ''; ?>>Other</option>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label for="department" class="form-label">Department</label>
              <select name="department" class="form-control" id="department">
                <option value="">Select Department</option>
                <?php
                $select_dep = "SELECT * FROM `tbl_depatment`";
                $res_dep = $con->query($select_dep);
                while ($dep = $res_dep->fetch_assoc()) {
                  $selected = ($staff['department'] ?? '') === $dep['depatment_name'] ? 'selected' : '';
                ?>
                  <option value="<?php echo $dep['depatment_name']; ?>" <?php echo $selected; ?>>
                    <?php echo $dep['depatment_name']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <!-- Third Row -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="branch" class="form-label">Branch</label>
              <select name="branch" class="form-control" id="branch">
                <option value="">Select Branch</option>
                <?php
                $select_branch = "SELECT * FROM `tbl_branch`";
                $res_branch = $con->query($select_branch);
                while ($branch = $res_branch->fetch_assoc()) {
                  $selected = ($staff['branch'] ?? '') === $branch['branch_name'] ? 'selected' : '';
                ?>
                  <option value="<?php echo $branch['branch_name']; ?>" <?php echo $selected; ?>>
                    <?php echo $branch['branch_name']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" name="date" class="form-control" id="date" value="<?php echo $staff['date'] ?? ''; ?>">
            </div>
          </div>

          <!-- Photo Upload -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="photo" class="form-label">Photo</label>
              <input type="file" accept="image/*" name="photo" class="form-control" id="photo" onchange="previewImage(event)">
              <img id="preview" src="<?php echo $staff['photo'] ?? '#'; ?>" alt="Image Preview" style="max-width: 100%; display: <?php echo isset($staff['photo']) ? 'block' : 'none'; ?>; border: 1px solid #ddd; padding: 5px;" />
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

  <script>
    function previewImage(event) {
      const preview = document.getElementById('preview');
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        preview.style.display = 'none';
      }
    }
  </script>
</body>
</html>
