<?php
setlocale(LC_TIME, array('al_AL.UTF-8', 'al_AL@euro', 'al_AL', 'Albanian'));


$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "ag_nextprevius";


try {
    $db = new PDO("mysql:host=$hostname; dbname=$dbname", "$username", "$password", array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}

