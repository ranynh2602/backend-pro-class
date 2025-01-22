<?php 
$color = 1;
if($color){
      $bg_color = "blue";
}
elseif($color == 2){
      $bg_color = "yellow";
     
}
else{
      $bg_color = "green";
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<style>
      .box{
            width: 300px; height: 300px;
            background-color: red;
      }
</style>
<body>
      <div style="background-color: <?php echo $bg_color; ?>;" class="box"></div>
</body>
</html>