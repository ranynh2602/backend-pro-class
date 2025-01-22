<?php
// index array
$car = array("A", "B", "C");
$num = array(1, 2, 3);
//0, 1, 2
echo "Car Is : " . $car[2];
echo "<br> Number Is : " . $num[1];

//PHP Associative Arrays
$Array2 = array("web1" => "Html", "web2" => "Css");

echo "<br>Array2 key web1 is : " . $Array2["web1"];
echo "<br>Array2 key web2 is : " . $Array2["web2"];

//PHP Multidimensional Arrays

$Array3 = array(
  array("A", 1, 2), //0
  // 0   1   2

  array("B", 4, 5), //1
  // 0   1   2
);

echo "<br> Array3 Is : " . $Array3[1][1];

//var_dump($car);
//var_dump($num);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Array</h3>
</body>

</html>