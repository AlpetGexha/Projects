<?php
$msg ="";
include "config.php";
include "assets/php/function.php";


//****************Regjistrimi ****************//
if (isset($_POST['register_submit'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  // Marrja e usernamit dhe emailit qe ekzitonjn ne Data Basë 
  $s_username = "SELECT * FROM users WHERE username='$username'";
  $s_email = "SELECT * FROM users WHERE email='$email'";
  $result_username = mysqli_query($db, $s_username);
  $result_email = mysqli_query($db, $s_email);
  $usernamelength = strlen($username);
  $passwordlength = strlen($password);
  if ($usernamelength < 3) {
    $msg = "Username-i duhet t&euml; jet&euml; s&euml; paku 3 karaktere";
  }
  if ($usernamelength > 50) {
    $msg = " Username-i nuk mund t&euml; jet&euml; m&euml; i madh se 50 karaktere";
  }

  if ($passwordlength < 6) {
    $msg = " Fjal&euml;kalimi duhet t&euml; jet&euml; s&euml; paku 6 karaktere";
  }
  if ($passwordlength > 255) {
    $msg = "Fjal&euml;kalimi nuk mund t&euml; jet&euml; më i madh se 255 karaktere";
  }
  if (mysqli_num_rows($result_username) > 0) { //Errori për usernamein qe ekziton 
    $username_error = "Usernamemi ekziton tashm&euml;";
  }
  if (mysqli_num_rows($result_email) > 0) { //Errori për emailin qe ekziton 
    $email_error = "Emaili ekziton tashm&euml;";
  } else { //Nese jane ne rregull te thenat atëherë insertoj te thenat në Data Basë, encypto passwordin dhe shko ne llogin 
    $password1 = password_hash($password, PASSWORD_DEFAULT);
    $insert = "INSERT into users(emri,mbiemri,username,password,email)VALUES('$emri','$mbiemri','$username','$password1','$email')";
    mysqli_query($db, $insert);

    header("Location:index.php");
  }
}

//****************Login****************//
if (isset($_POST['login_submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $sql = "SELECT * from users where username = '$username'";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_assoc();

  if (mysqli_num_rows($results) != 1) { //Nese perdoruesi nuk ekziton
    $user_error = "Ky p&euml;rdorues nuk ekziston. Regjistrohuni tani <a href='register.php' class='text-info'>Regjistrohu !</a>!!";  //errori per username
  } else if (password_verify($password, $row['password'])) { //Nese passwordi edhe gabim  dhe passwordi per encyptim
    $_SESSION['username'] = $username; //Username
    $_SESSION['loggedIn'] = true; //Nese passwordi edhe ne rregull
    header('Location:index.php'); //Shko në faqe kryesore
  } else {
    $password_error = "Fjalekalimi &euml;sht&euml; gabim"; //errori per Password

  }
}
?>