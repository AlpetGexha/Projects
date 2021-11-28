<?php

/** Redirect */
class Go
{
    public static function to(String $location)
    {
        if ($location) {
            if (is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        exit();
                        break;
                    case 403:
                        header('HTTP/1.0 403 Access denied!');
                        include 'includes/errors/403.php';
                        exit();
                        break;
                }
            }
            header("Location: " . $location . "");
            exit();
        }
    }
}
