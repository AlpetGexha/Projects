<?php include('config.php');
//msg per errorat
  $username_error = "";
  $email_error = "";
  $msg = "";
  //POST
if (isset($_POST['submit'])){
	$emri = mysqli_real_escape_string($db,$_POST['emri']);
	$mbiemri = mysqli_real_escape_string($db,$_POST['mbiemri']);
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);


// Marrja e usernamit dhe emailit qe ekzitonjn ne Data Basë 
	  $s_username= "SELECT * FROM users WHERE username='$username'";
  	$s_email = "SELECT * FROM users WHERE email='$email'";
  	$result_username = mysqli_query($db, $s_username);
  	$result_email = mysqli_query($db, $s_email);
   $usernamelength= strlen($username);
  $passwordlength= strlen($password);
      if ($usernamelength < 3){
      $msg = "Username-i duhet të jetë së paku 3 karaktere";
      }
      if ($usernamelength > 50){
      $msg = " Username-i nuk mund të jetë më i madh se 255 karaktere";
      }

      if ($passwordlength < 6){
      $msg = " Fjalëkalimi duhet të jetë së paku 6 karaktere";
      }
      if ($passwordlength > 255){
      $msg = "Fjalëkalimi nuk mund të jetë më i madh se 255 karaktere";
      }
    if (mysqli_num_rows($result_username) > 0) {//Errori për usernamein qe ekziton 
  	  $username_error = "Ky username eshte perdorur me pare"; 
  	}
if(mysqli_num_rows($result_email) > 0){//Errori për emailin qe ekziton 
  	  $email_error = "Ky email eshte perdorur me pare"; 
}else{//Nese jane ne rregull te thenat atëherë insertoj te thenat në Data Basë, encypto passwordin dhe shko ne llogin 
	$password=password_hash($password,PASSWORD_DEFAULT);
	$insert = "INSERT into users(emri,mbiemri,username,password,email,mosha,gjinia)VALUES('$emri','$mbiemri','$username','$password','$email','$mosha','$gjinia')";
 mysqli_query($db, $insert);
 header("Location:login.php");

      
  	}
  }
?>
