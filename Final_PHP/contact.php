<?php 
include("config.php");
// ne fillim kyqu para se te hysh ne index
session_start();
ob_start();
//Nese nuk je i kyqur nuk mund te hysh ne kete faqe
include('../Final_PHP/items/need_to_login.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- ------------ Foto per title bar ------------------ -->
     <?php include('../Final_PHP/items/title_bar_img.php'); ?>
    <title>Kontakti</title>
    <!-- ------------ META ------------------ -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ------------ Link  ------------------ -->
    <link rel="stylesheet" type="text/css" href="../Final_PHP/assets/css/contact.css">

    <!-- ------------ style font  ------------------ -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <!-- ------------ boostrap ------------------ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- ------------  ------------------ -->
  </head>
  <body>
<?php include('../Final_PHP/items/navbar.php'); ?>  
    <!-- ------------ Forma Contact ------------------ --> 
 <form method="POST" action="contact_progresing.php">
  <div class="container mt-5">
    <div class="contact-box">
      <div class="left"></div>
      <div class="right">
        <h2>Na Kontaktoni</h2>
        <!--
        <input type="text" class="inputat" placeholder="Emri" required="" name="emri" >
        <input type="email" class="inputat" placeholder="Email" required="" name="email" >
        <input type="text" class="inputat" placeholder="Numri i telefonit" name="telefoni">
      -->
        <textarea placeholder="Message" class="inputat" required=""  name="mesazhi" rows="10" cols="60" oninvalid="this.setCustomValidity('Ju lutem shkruani mesazhi');" oninput="this.setCustomValidity('');"
        ></textarea>
        <input id="btn" class="btn" type="submit" name="submit" value="Send">
      </div>
    </div>
  </div>
</form>
<!-- ------------  ------------------ -->
</body>
</html>



