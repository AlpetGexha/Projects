<?php 
session_start();
ob_start();
include('../config.php');
include('../items/need_to_login.php'); 
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>Contact</title>
</head>
<body>
<?php include('../items/admin_navbar.php');?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Emri</th>
      <th scope="col">Mbiemri</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Mesazhi</th>
    </tr>
  </thead>
  <tbody>

  <?php 
$sql = "SELECT  u.id ,u.emri, u.mbiemri, u.username, u.username, u.email, m.mesazhi from users u , mesazhi m ";
$results = mysqli_query($db,$sql); 
while(($row = $results->fetch_assoc())!=null){
echo '<tr>';
echo "<td>".$row['id']."</td>";
echo "<td>".$row['emri']."</td>";
echo "<td>".$row['mbiemri']."</td>";
echo "<td>".$row['username']."</td>";
echo "<td>".$row['email']."</td>";
echo '<td>'.'<textarea class="inputat" required=""  name="body" rows="4" cols="30" id="body" readonly+>'.$row['mesazhi'].'</textarea>'.'</td>';
echo '</tr>';
	}
?>
   <textarea class="inputat" required=""  name="body" rows="6" cols="30" id="body"></textarea>
</tbody>
</table>

</div>
</body>
</html>