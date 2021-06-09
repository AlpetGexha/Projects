<?php include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
include('../Final_PHP/items/need_to_login.php');

  $username = $_SESSION['username'];

  $select = "SELECT * from users where username='$username'";
  $results = mysqli_query($db,$select);
  $row = $results->fetch_assoc(); 

?>
<!DOCTYPE html>
<html>
<head>
    <!-- ------------ Foto per title bar ------------------ -->
 <?php include('../Final_PHP/items/title_bar_img.php'); ?>
 
  <title>Ndryshimi i Profilit</title>
    <!-- ------------ Foto per title bar ------------------ -->
<link rel="shortcut icon" type="image/x-icon" href="../Final_PHP/img/Killerlogo.jpg">
  
  <!-- ------------ Meta ------------------ -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta charset="utf-8">

  <!-- ------------ Links ------------------ -->
<link rel="stylesheet" type="text/css" href="../Final_PHP/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../Final_PHP/assets/css/login.css">

  <!-- ------------ Boostrap css ------------------ -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>


<!-- ------------ Boostrap JS ------------------ -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

 <?php include('../Final_PHP/items/navbar.php'); ?>  
<div class="container mt-5">

<!-- ------------ style ------------------ -->
<style type="text/css">
#login .container #login-row #login-column #login-box {
  padding: 30px;
} 
  .photo_update img {
  display: block;
  margin: auto;
  border: 3px black solid;
  border-radius: 10px;  
  box-shadow: 2px 2px 3px red; 
}
.file_submit{
  text-align: center;
}
</style>

<!-- ------------ foto e profilit ------------------ -->

<form class="img_profile" action="photo_update.php" method="post" enctype="multipart/form-data">
  <div class="photo_update" id="login">
   <div class="container mt-5">
    <div id="login-row" class="row justify-content-center align-items-center">
    <div id="login-column" class="col-md-6">
    <div id="login-box" class="col-md-12">

<?php 
     $sql = mysqli_query($db,"SELECT * FROM users where username = '$username'");
        while($row = mysqli_fetch_assoc($sql)){
  

         echo "<img width='486' height='486' src='image_profile/".$row['image']."' alt='Profile Pic'>";
          
          echo "<br>";
          
            } 
?>          
            <div class="file_submit">
            <br><input type="file" name="file">
            <input type="submit" name="submit" style="">
            </div>

</div>
</div>
</div>
</div>
</div>
</form>
