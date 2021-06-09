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
  
<!-- ------------ Scripti Për Iconat ------------------ -->
<script type="text/javascript" src="https://kit.fontawesome.com/a076d05399.js" ></script>

<!-- ------------ Boostrap JS ------------------ -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

 <?php include('../Final_PHP/items/navbar.php'); ?>  
<div class="container mt-5">

<!-- ------------ style ------------------ -->
<style type="text/css">
#login .container #login-row #login-column #login-box {
  padding: 30px !important;
}
</style>

<!-- ------------ Profili ------------------ -->

<form method="POST" action="myprofile_update.php">
<div id="login">
<div class="container mt-5">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
<div id="login-box" class="col-md-12">
    <div class="form-group">
      <!-- -------------- FOTO  e Profili-------------------->
      <h4 class="text-info" style="text-align: center;">Foto e profilit</h4><br>
      <div class="profile_img">
      <?php 

     $sql = mysqli_query($db,"SELECT * FROM users where username = '$username'");
        while($row = mysqli_fetch_assoc($sql)){
        echo "<a target='_blank' href='image_profile/".$row['image']."'>"; 
        echo "<img width='286' height='286' src='image_profile/".$row['image']."' alt='Profile Pic'>";
        echo "</a>";
        echo "<br>";
          
            } 
      ?>
      </div>
<!-- --------------Te dhenat e userit -------------------->
    <?php 
 $sql = mysqli_query($db,"SELECT * FROM users where username = '$username'");
 $row = $sql ->fetch_assoc();
    ?>
        </div>
        <a class="photo_herf" href="myprofile_photo_edit.php">Ndrysho foton e Profilit</a>
  <div class="form-group">
    <label for="emri" class="text-info">Emri:</label><br>
      <input type="text" name="emri" id="emri" class="form-control" required="" autofocus="" placeholder="<?php echo $row['emri'];?>" value="<?php echo $row['emri'];?>" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin');" oninput="this.setCustomValidity('');" >
        </div>
   <div class="form-group">
     <label for="mbiemri" class="text-info">Mbiemri:</label><br>
       <input type="text" name="mbiemri" id="mbiemri" class="form-control" required="" placeholder="<?php echo $row['mbiemri'];?>" value="<?php echo $row['mbiemri'];?>" oninvalid="this.setCustomValidity('Ju lutem shkruani mbiemrin');" oninput="this.setCustomValidity('');" > 
         </div>
        <div class="form-group">
            <label for="email" class="text-info">Email:</label><br>
       <input type="email" name="email" id="email" class="form-control" required="" placeholder="<?php echo $row['email'];?>" value="<?php echo $row['email'];?>" oninvalid="this.setCustomValidity('Ju lutem shkruani emailn');" oninput="this.setCustomValidity('');" >
    </div>
      <button type="sumbit" class="btn btn-primary" id="btn_update" name="submit">Ndrysho</button>
       <a class="change_password_link" href="/Final_PHP/password_edit.php"> Ndrysho Passwordin </a> 
     <br>
   </div>

</div>
</div>
</div>
</div>
</form>