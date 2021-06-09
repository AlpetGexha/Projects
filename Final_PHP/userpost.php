<?php include("config.php");
//session
session_start();
ob_start();
include('../Final_PHP/items/need_to_login.php');
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Postimet e Userit</title>

  <link rel="stylesheet" type="text/css" href="../Final_PHP/assets/css/style.css">

    <!-- ------------ Foto per title bar ------------------ -->
   <?php include('../Final_PHP/items/title_bar_img.php'); ?>

  <!-- ------------ Meta ------------------ -->
   <meta name="viewport" content="width=device-witdh,initi3l-scale=1.0"/>
   <meta charset="utf-8">
   <!-- ------------ Boostrap css ------------------ -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

<!-- ------------ Boostrap JS ------------------ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> 

<!-- ------------ Style ------------------ -->
<style type="text/css">
  
  .jumbotron {
    position: relative;
    border: 2px black solid;
    background-color: #e9ecef;
    padding: 40px;
        }
  .delete {
    position:absolute;
    top: 25px;
    right: 20px;
        }
  #btn_search{
    margin: 10px 0px 10px !important;
  }
  
</style>

 <?php include('../Final_PHP/items/navbar.php'); ?>  
 <div class="container mt-5">
<?php 
//Selektoj të thënat nga user dhe post per te marr user id dhe post id per te krijuar mundesin qe vetem ti mund ti fshish/ndryshosh postimet e tua qe i keni krijuar
//from post p = "shkurtesa e post"
$username = $_SESSION['username'];
$select = "SELECT u.emri, u.mbiemri, p.emri_post, u.username, p.body, p.id from post p, users u where p.user_id = u.id and u.username = '$username' order by p.id DESC ";
$result   = mysqli_query($db,$select);

//shfaqja e te gjithave postimeve qe i keni bere ju
while (($row = $result -> fetch_assoc())!=null) {
  
  echo "<div class='jumbotron'>";
  echo "<h1 class='display-4'>".$row['emri_post']."</h1>";
  echo " <p class='lead'>".$row['body']."</p>";
  echo "<hr class='my-4'>";
  echo "<p>Postuesi: ".$row['emri']." ". $row['mbiemri']."</p>";
  echo "<div class='delete'>";
  echo "<td><a href='edit.php? id=".$row['id']."'class='btn btn-success'>Ndrysho</a><a href='delete.php? id=".$row['id']."'class='btn btn-danger'>Fshije</a> </td>";// Edit/Updates
  echo "</div>";
  echo "</div>";
  echo "<br>";
}
//Errori nese nuk ka postime
if (mysqli_num_rows($result)==0){
  echo "<p style='text-align:center; color:red; font-size:20px'> Nuk ka rezultate";
}
?>
</div>
</body>
</html>