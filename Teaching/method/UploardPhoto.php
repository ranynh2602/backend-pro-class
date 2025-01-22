

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
    margin-top: 10px;

  }
  .box img{
    width: 100%; height: 100%;
    object-fit: cover;

  }
</style>

<body>
  <form action="./action.php" method="post" enctype="multipart/form-data">
    <input onchange="loadFile(event)" type="file" id="photo" name="photo">
    <button type="submit" name="btn_save">Click</button>

  </form>
  <div class="box">
    <img id="imgPreView" src="" alt="">

  </div>
  <h4>UploardPhoto.php</h4>
</body>

<script>
  const fileImg = document.getElementById('photo');
const imgPreView = document.getElementById('imgPreView');

fileImg.addEventListener('change', () => {
  const file = fileImg.files[0]; // Use fileImg.files[0] instead of this.files[0]
  const reader = new FileReader();

  reader.addEventListener('load', () => {
    imgPreView.src = reader.result;
  });

  reader.readAsDataURL(file);
});

</script>

</html>