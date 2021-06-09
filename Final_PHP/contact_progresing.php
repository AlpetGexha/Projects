<?php include('config.php');
//POST
if (isset($_POST['submit'])){
$mesazhi = mysqli_real_escape_string($db,$_POST['mesazhi']);

//insertimi i të thënave per contact
$insert = "INSERT into mesazhi(mesazhi)VALUES(	'$mesazhi')";

//hape nje file me emrin contact.txt , "a+" Read/Write
$file = fopen("contact.txt", "a+");

$teksti = $emri."\n".$telefoni."\n".$email."\n".$mesazhi."\n*********************************************************************\n";

mysqli_query($db, $insert);
fwrite($file, $teksti);
header("Location:contact.php");

}
?>