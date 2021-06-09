<?php 
$msg = "";
include("config.php");
include("create_post_procesing.php");
include('../Final_PHP/items/need_to_login.php');

?>
<!DOCTYPE html>
<html>
<head>
  <!-- ------------ Foto per title bar ------------------ -->
 <?php include('../Final_PHP/items/title_bar_img.php'); ?>
  <title>Krijimi i posteve</title>
  
<!-- ------------ Meta ------------------ -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="utf-8">

<!-- ------------ Link ------------------ -->
  <link rel="stylesheet" type="text/css" href="../Final_PHP/assets/css/loading.css">
  <link rel="stylesheet" type="text/css" href="../Final_PHP/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../Final_PHP/assets/css/create_post.css">

<!-- ------------ Boostrap CSS------------------ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- ------------ Font-Style ------------------ -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>
<body>
<!-- ------------ Jquery JS ------------------ --> 
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- ------------ Boostrap JS------------------ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

 <?php include('../Final_PHP/items/navbar.php'); ?>  

<!-- ------------ Forma për krijimin e postit ------------------ -->
<form action="#" method="POST" enctype="multipart/form-data">
   <div class="container mt-5">
      <div class="center">
        <?php 
          if (!empty($msg)){
        echo '<p class="error"> '.$msg.'</p>';
        }
        ?>
        <h2>Krijo një postim</h2>
        <input id="emri_post" type="text" class="inputat" placeholder="Emri i Postimit" required="" name="emri_post" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');" >
        <textarea placeholder="Shruani Çfar&euml; të doni në lidhje me postimin..." class="inputat" required=""  name="body" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');" ></textarea>
        <!-- ----------Upload --------- -->
        <div class="Upload">
          <input class="inputat" id="upload" type="file" name="image">
        </div> <br>
        <input id="btn" class="btn" type="submit" name="submit" value="Posto">
      </div>
  </div>
</form>

<!-- ----------LOADING (Duke u pustuar)---------- -->
<div class="loader loader-default" data-text="Duke u postuar"></div>
    <script>
      
        $(document).ready(function(){
            $('#btn').click(function(){
                if (($('#emri_post').val().length !== 0) && ($('#body').val().length !== 0)){
                    $( ".loader" ).addClass("is-active");}
              });
              });
    </script>
</body> 
</html>
