<?php include('config.php');
//POST
if (isset($_POST['submit'])){
$emri = mysqli_real_escape_string($db,$_POST['emri']);
$comment = mysqli_real_escape_string($db,$_POST['comment']);
$posti = mysqli_real_escape_string($db,$_POST['emri_post']);

//Insertimi per Postet
$INSERT = "INSERT into post (emri,body,emri_post)VALUES('$emri','$comment','$posti')";
mysqli_query($db,$INSERT);
header("Location:index.php");
}
?>

