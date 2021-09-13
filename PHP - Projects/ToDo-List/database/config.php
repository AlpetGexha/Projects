<?php

$username = "root";
$password = "";
$hostname = "localhost";
$dbname = "ag_todo";


try {
    $db = new PDO("mysql:host=$hostname; dbname=$dbname", "$username", "$password", array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
