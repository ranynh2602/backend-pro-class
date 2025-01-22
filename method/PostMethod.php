<?php
if(isset($_POST['submit'])){

  $user = 'admin';
  $password = '123';

  $text_name = $_POST['textuser'];
  $text_password = $_POST['password'];

  if($user == $text_name && $password == $text_password){
    //echo "Yes";
    header('Location: UserLogin.php');
  }
  else{
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
  <title>Form Login</title>
</head>
<body>
  <form action="./PostMethod.php" method="post">
   <input type="text" name="textuser" id="textuser">
   <input type="text" name="password" id="password">
   <input type="submit" name="submit" value="Button">



  </form>
  
</body>
</html>