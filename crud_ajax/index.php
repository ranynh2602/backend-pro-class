<?php
include './DataTable.php';
include './config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud_Ajax</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <?php include './Header.php'; ?>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add/Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="dataForm">
                <input type="hidden" id="actionType" value="insert">
                <div class="mb-3">
                  <label for="inputID" class="form-label">ID</label>
                  <input type="text" class="form-control" id="inputID" placeholder="Enter Product ID" required>
                </div>
                <div class="mb-3">
                  <label for="inputName" class="form-label">Name</label>
                  <input type="text" class="form-control" id="inputName" placeholder="Enter Product Name" required>
                </div>
                <div class="mb-3">
                  <label for="inputQty" class="form-label">Quantity</label>
                  <input type="number" class="form-control" id="inputQty" placeholder="Enter Quantity" required>
                </div>
                <div class="mb-3">
                  <label for="inputPrice" class="form-label">Price</label>
                  <input type="number" class="form-control" id="inputPrice" placeholder="Enter Price" required>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="btn_save" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <table id="example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>ProName</th>
            <th>ProQTY</th>
            <th>ProPrice</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $select = "SELECT * FROM `tbl_product`";
          $res = $con->query($select);
          while ($Data = $res->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $Data['id'] ?></td>
              <td><?php echo $Data['proName'] ?></td>
              <td><?php echo $Data['proQty'] ?></td>
              <td><?php echo $Data['proPrice'] ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-primary btn-edit" 
                  data-id="<?php echo $Data['id']; ?>" 
                  data-name="<?php echo $Data['proName']; ?>" 
                  data-qty="<?php echo $Data['proQty']; ?>" 
                  data-price="<?php echo $Data['proPrice']; ?>">
                  Edit
                </button>
                <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="<?php echo $Data['id']; ?>">Delete</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#btn_save').click(function () {
        const actionType = $('#actionType').val();
        handleSave(actionType);
      });

      function handleSave(action) {
        const id = $('#inputID').val().trim();
        const name = $('#inputName').val().trim();
        const qty = $('#inputQty').val().trim();
        const price = $('#inputPrice').val().trim();

        if (!id || !name || !qty || !price) {
          alert('All fields are required!');
          return;
        }

        $.ajax({
          url: 'action.php',
          method: 'POST',
          data: { action, id, name, qty, price },
          success: function (response) {
            alert(response.message);
            $('#exampleModal').modal('hide');
            $('#dataForm')[0].reset();
            refreshTable();
          },
          error: function () {
            alert('Error occurred.');
          }
        });
      }

      function refreshTable() {
        $.ajax({
          url: './action.php',
          method: 'GET',
          success: function (response) {
            $('#example tbody').html(response);
          },
          error: function () {
            alert('Error refreshing table.');
          }
        });
      }

      $(document).on('click', '.btn-edit', function () {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const qty = $(this).data('qty');
        const price = $(this).data('price');

        $('#inputID').val(id).prop('disabled', true);
        $('#inputName').val(name);
        $('#inputQty').val(qty);
        $('#inputPrice').val(price);
        $('#actionType').val('update');
        $('#exampleModal').modal('show');
      });

      $(document).on('click', '.btn-delete', function () {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this product?')) {
          $.ajax({
            url: './action.php',
            method: 'POST',
            data: { action: 'delete', id },
            success: function (response) {
              alert(response.message);
              refreshTable();
            },
            error: function () {
              alert('Error deleting product.');
            }
          });
        }
      });
    });
  </script>
</body>

</html>
