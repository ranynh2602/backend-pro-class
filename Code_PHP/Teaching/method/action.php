<?php
$filename = $_FILES['photo']['name'];
$item = $_FILES['photo']['tmp_name'];
//fulder for img
$path =  'img/';
$result =  move_uploaded_file($item, $path . $filename);
if ($result) {
?>
  <script>
    alert("Success!")
  </script>
<?php
} else {
?>
  <script>
    alert("Not Success!")
  </script>

<?php
}

//  echo $file . $item;


?>