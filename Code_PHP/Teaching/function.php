<?php
function test(){
  $a = 10; $b = 20;
  echo $a + $b . "<br>";

}
test();
//PHP Function Arguments

function familyName($fname) {
  echo "$fname <br>";
}

familyName("Jani");
familyName("Hege");
familyName("Stale");
familyName("Kai Jim");
familyName("Borge");

function familyName2($fname, $year) {
  echo "$fname Born in $year <br>";
}

familyName2("Hege", 1975);
familyName2("Stale", 1978);
familyName2("Kai Jim", 1983);
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
  
</body>
</html>