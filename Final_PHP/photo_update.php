<?php include('config.php');
//Session
session_start();
ob_start();
$username = $_SESSION['username'];
    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"image_profile/".$_FILES['file']['name']);
        $q = mysqli_query($db,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
    }
   header("Location:myprofile_edit.php");

        ?>