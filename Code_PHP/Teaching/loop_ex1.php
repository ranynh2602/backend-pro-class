<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  .box {
    width: 300px;
    height: 300px;
    background-color: red;
    float: left;
    margin: 5px 5px;
  }
</style>

<body>
  <!--<div class="box"></div>-->

</body>
<?php

//while loop 
$i = 0;
while ($i < 6) {
?>
  <div class="box"></div>

<?php
  $i++;
}

//for loop 
for ($x = 0; $x <= 3; $x++) {

  if($x == 2){
    $color = "blue";

  }
  else{
    $color = "green";

  }
  ?>
  <div class="box" style="background-color: <?php echo $color ?>;">
  <?php  echo $x; ?>
</div>

  <?php
}


?>

</html>