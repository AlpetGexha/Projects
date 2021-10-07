<?php include_once 'includes/ini.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<!-- return database info -->

<?php
/*
echo '<pre>';
echo var_dump(Config::get('mysql')); //localhosts
 */
?>

<!-- Chek database -->
<?php //DB::getDB() 
?>


<!-- Chek query -->
<?php
/**
$user = DB::getDB()->action('SELECT *', 'users', array('usersname ', '=', 'AlpetG'));
   $user = DB::getDB()->get('users', array('username ', '=', 'AlpetG'));

   if ($user) {
       echo 'Code its okey!';
   } else {
       echo 'Code its not  okey!  or no users active';
   }
 */
?>

<!-- Chek result -->
<?php
/** TODO:
$user = DB::getDB()->sql('SELECT * FROM users');
if (!$user->count()) {
    echo "No Data";
} else {
    //     foreach ($user->results() as $user) {
    //         echo $user->emri, '<br/>';
    //   }
    foreach ($user->results() as $users) {
        echo "emri: " . $users->emri, '<br/>',
        "Mbiemri: " .  $users->mbiemri, '<br/>',
        "us: " . $users->username, '<br/><br/>';
    }

}
 */
?>
<!-- Insert/Update -->
<?php

/** Insert
$x = DB::getDB()->Insert('users', array(
    'emri' => 'Alpet',
    'mbiemri' => 'Gexha'
));
echo $x; //INSERT INTO users (`emri`, `mbiemri`) VALUES (?, ?)
 */
/** Update
$x = DB::getDB()->update('users', 65, array(
    'emri' => 'Alpet',
    'mbiemri' => 'Gexha',
    'username' => 'AlpetG23',
    'password' => '123456789'
));

echo $x; //UPDATE users SET emri = ?, mbiemri = ?,  WHERE id = 65
 */


?>


<!-- Check flash method -->
<?php
/*
if (Session::exist('success')) {
    echo Session::flash('success');
}
*/
?>


<!-- Check User -->
<?php
$x = new  User();
if (!$x->isLoggendIn()) {
    Go::to('login.php');
}
Session::flash('password');
?>

<p>Hello <?= escape($x->data()->username); ?></p> <br>
<p> <?= escape($x->data()->emri); ?> </p>

<p> <?= escape($x->data()->mbiemri); ?></p>
<p>Hello <a href="profile.php?id=<?= escape($x->data()->id); ?>">
        <?= escape($x->data()->username); ?></a>!</p>


<ul>

    <li><a href="logout.php">Logut</a></li>
    <li><a href="update.php">Update</a></li>
    <li><a href="changePassword.php">changePassword</a></li>


</ul>



</body>

</html>