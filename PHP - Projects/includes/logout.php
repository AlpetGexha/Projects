<?php
require_once 'includes/ini.php';
$x = new User();

if (!$x->isLoggendIn()) {
    Go::to('login.php');
} else {
    $x->logout();
}
