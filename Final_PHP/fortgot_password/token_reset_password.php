<?php
include('../config.php');
session_start();
ob_start();
if (isset($_POST['submit'])){
  $email = $_POST['email'];
  $sql = "SELECT * from users where email='email'";
  $results = mysqli_query($db,$sql);
	$row = $results->fetch_assoc();
  if (mysqli_num_rows($results)>0) {
   
    $db_email = $row['email'];
    $db_id = $row['id'];
    $token = unquid(md5(time())); //Random token
    $sql = "INSERT into users(id, email, token)VALUES (NULL, '$email, '$token')";
    //mail($to, $subject, $message, $headers)
    if (mysqli_qury($db, $sql)) {
     $to = $db_email;
     $subject = "password reset link";
     $message = "Click <a href='http://localhost/Final_PHP/fortgot_password/change_password.php?token=$token'>here</a> to reset u password";
     $headers = "MIME-Version: 1.0" . "\r\n";
     $headers = "conectet-type:text/html;charser=UTF-8" . "\r\n";
     $headers = "from <agexha10@gmail.com>" . "\r\n";
     $msg = "<div class='alert alert-success'> Password reset link has been send></div>";
    } else {
      $msg = "<div class = 'alert alert-danger'> User not found </div>";
    }
  }
}

?>