<?php
include('config.php');
session_start();
ob_start();
//POST
if (isset($_POST['submit'])){
	$emri_post = mysqli_real_escape_string($db,$_POST['emri_post']);
	$body = mysqli_real_escape_string($db,$_POST['body']);
	$image = mysqli_real_escape_string($db,$_FILES['image']['name']);
    $username = mysqli_real_escape_string($db,$_SESSION['username']);

/* ********** Image **********/ /*
$target = "images/".basename($image);//vendothja ku ruhen fotot
$fileTmp = $_FILES['image']['tmp_name'];
$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$fileType = $_FILES['image']['type'];
$fileError = $_FILES['image']['error'];
*/
//Marrja e id nga useri 
$sql = "SELECT id from users where username='$username'";
$results = mysqli_query($db, $sql);
$row = $results->fetch_assoc();
$user_id = $row['id'];

  	// Get image name
  	$image = mysqli_real_escape_string($db,$_FILES['image']['name']);
  	// Get text

  	// image file directory
  	$target = "images/".basename($image);

  	$insert = "INSERT into post (emri_post,body,image,user_id)VALUES('$emri_post','$body','$image','$user_id')";
     mysqli_query($db,$insert);
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		
  	}else{
  		$msg = "Ngarkimi i imazhit dështoi";
  	}
  	header("Location:index.php");
  }



// /* ********** Image **********/
// $fileExt = explode('.',$fileName);
// $fileAcualeExt = strtolower(end($fileExt));

// $allowed = array('jpg', 'jpeg' , 'png');


// if (in_array($fileAcualeExt, $allowed)) {
// 	if ($fileError === 0 ) {
// 		if ($fileSize < 10485760) { //10mb
// 			$fileNameNew = uniqid('.', true).".".$fileAcualeExt;
// 			$fileDestination = 'images/' .$fileNameNew;
// 			move_uploaded_file($fileTmp, $fileDestination);
// 			 header("Location:index.php");
// 		} else {
// 			$msg = "Fotoja edhe shume e madhe! Ju lutem uplodoni foto deri ne<b> 3mb</b> ";
// 		}
// 	} else {
// 		$msg = "Pate nje problem ne uploadimin e keti fallji! Ju lutem provoni perseri";
// 	}
// } else {
// 	$msg = "Ju nuk mund te uplodoni file te keti tipi! Ju lutem perdorni <b>jpg, jpge ose png </b>(foto) ";

// /* ************* Komaillimi i fotove ****************/
// function compressImage($source, $destination, $quality) {

//   $info = getimagesize($source);

//   if ($info['mime'] == 'image/jpeg') 
//     $image = imagecreatefromjpeg($source);

//   elseif ($info['mime'] == 'image/jpg') 
//     $image = imagecreatefromgif($source);

//   elseif ($info['mime'] == 'image/png') 
//     $image = imagecreatefrompng($source);

//   imagejpeg($image, $destination, $quality);

//   return $destination;

// }
// header('Location:index.php');
//  }
//   //$result = mysqli_query($db, "SELECT * FROM post");
 
// }
?>