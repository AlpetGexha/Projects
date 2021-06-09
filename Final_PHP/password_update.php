<?php include('config.php');
//Session
session_start();
ob_start();

//per user active
$user = $_SESSION['username'];

if ($user){
 	
	if (isset($_POST['submit'])){ 	
	$momental_password = mysqli_real_escape_string($db,$_POST['momental_password']);
	$new_password = mysqli_real_escape_string($db,$_POST['new_password']);
	$continiu_password= mysqli_real_escape_string($db,$_POST['continiu_password']);
    $passwordlength= strlen($new_password);

	$sql = ("SELECT password FROM users where username='$user'");
	$results = mysqli_query($db, $sql);
	$row = $results->fetch_assoc();
	$db_password = $row['password'];

    //   if ($passwordlength < 6){
    //   $msg = " Fjalëkalimi duhet të jetë së paku 6 karaktere";
    //   }
    //   if ($passwordlength > 255){
    //   $msg = "Fjalëkalimi nuk mund të jetë më i madh se 255 karaktere";
    //   }

if (password_verify($momental_password, $db_password) == 1) {

		if ($new_password == $continiu_password) {
       $update_password =  "UPDATE password FROM users set password='$new_password' where username='$user'";
	    mysqli_query($db, $update_password);
		$msg_sukses = "Passwordi u ndryshua me sukses";
		}

	} else{
		$msg = "Passwordi momental edhe gabim";
	}
 }
}
 ?>

