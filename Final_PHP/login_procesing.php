<?php include('config.php');
//Session
session_start();
ob_start();

//POST
if (isset($_POST['submit'])){
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$password = mysqli_real_escape_string($db,$_POST['password']);


	$sql = "SELECT * from users where username = '$username'";
	$results = mysqli_query($db,$sql);
	$row = $results->fetch_assoc();

	if (mysqli_num_rows($results)!=1){ //Nese perdoruesi nuk ekziton
		$user_error = "Ky perdorues nuk ekziston. Regjistrohuni tani <a href='register.php' class='text-info'>Regjistrohu !</a>!!";	//errori per username
	}
	else if (password_verify($password, $row['password'])) {//Nese passwordi edhe gabim	dhe passwordi per encyptim
		$_SESSION['username'] = $username;//Username
		$_SESSION['loggedIn'] = true;//Nese passwordi edhe ne rregull
		header('Location:index.php');//Shko në faqe kryesore
	}
	else{
		$password_error = "Fjalekalimi eshte gabim";//errori per Password
		
	}
}
    // $usernamelength= strlen($username);
    // $passwordlength= strlen($password);
    //   if ($usernamelength < 3){
    //   $msg = "Emri i përdoruesit duhet të jetë së paku 3 karaktere";
    //   }
    //   if ($usernamelength > 50){
    //   $msg = " Username-i nuk mund të jetë më i madh se 255 karaktere";
    //   }

    //   if ($passwordlength < 6){
    //   $msg = " Fjalëkalimi duhet të jetë së paku 6 karaktere";
    //   }
    //   if ($passwordlength > 255){
    //   $msg = "Fjalëkalimi nuk mund të jetë më i madh se 255 karaktere";
    //   }
?>

