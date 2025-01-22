<?php
$fileName = $_FILES['photo2']['name'];
$item = $_FILES['photo2']['tmp_name'];
//echo $fileName . $item;
//fulder img
$path = 'img2/';
$result = move_uploaded_file($item, $path . $fileName);
if($result){
      ?>
      <script>
        alert("Success!")
      </script>
    <?php     
}
else{
      ?>
      <script>
        alert("Not Success!")
      </script>
    
    <?php     
}

?>