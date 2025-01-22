<?php
// user login

if (isset($_POST['submit'])) {
  $use = 'admin';
  $password = 123;
  $text_name = $_POST['textuser']; 
  $text_password = $_POST['password'];

  // Check if both username and password match
  if ($use == $text_name && $password == $text_password) {
     header('Location: test.php');
     exit;  // Always use exit after header redirection
  } else {
?>
    <script>
      alert("No User");
    </script>
<?php
  }
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

<body>
  <form action="./UserLogin.php" method="post">
    <input type="text" name="textuser" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="submit" value="Button">
  </form>
</body>

</html>
