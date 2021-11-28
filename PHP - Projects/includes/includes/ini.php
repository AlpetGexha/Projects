<?php
session_start();

//batabase config 
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'ag_include',
        'options' => array(
            PDO::ATTR_PERSISTENT => FALSE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        )
    ),

    'session' => array(
        'sessionName' => 'user',
        'sessionRole' =>  'role',
        'sessionToken' => 'token',
        'sessionLogin' => 'login',
        // 'sessionPermissions' => 'permissions',
    )
);

//auto load classes
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.class.php';
});

require_once 'function.php';
