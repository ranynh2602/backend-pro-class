<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Loop</h2>
  <?php
  //while loop  
  $i = 1;
  while ($i < 6) {
    echo "while Loop is : ". $i . "<br>";
    $i++;
  }
  //do while loop 
  $i = 1;
  do {
    echo "do while Loop is : ". $i . "<br>";
    $i++;
  } while ($i < 5);

  //for loop 
  for ($x = 0; $x <= 10; $x++) {
    echo "The number of loop is: $x <br>";
  }

  ?>
</body>

</html>