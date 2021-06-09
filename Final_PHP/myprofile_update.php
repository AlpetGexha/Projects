<?php include('config.php');
//Session
session_start();
ob_start();
//POST
if (isset($_POST['submit'])){
	$username = mysqli_real_escape_string($db,$_SESSION['username']);
	$emri = mysqli_real_escape_string($db,$_POST['emri']);
	$mbiemri = mysqli_real_escape_string($db,$_POST['mbiemri']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	
   $password1=password_hash($password,PASSWORD_DEFAULT);//Passworti i enkriptuar

	$update = "UPDATE users set emri='$emri',mbiemri='$mbiemri', email='$email',password='$password1' where username='$username'";
	mysqli_query($db,$update);
    header("Location:myprofile.php");
 }
 ?>