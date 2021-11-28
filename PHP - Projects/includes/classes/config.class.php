<?php

use PhpParser\Node\Expr\Cast\String_;

/**
 * Konfigurimi i variables globale ne ini.php
 * @return sessin/sessionName
 * */
class Config
{
    public static function get(String $path = null)
    {
        if ($path) {
            $config = $GLOBALS['config'];
            $path  = explode('/', $path);
            //explode — Split a string by a string

            foreach ($path as $data) {
                if (isset($config[$data])) {
                    // echo  "<pre>";
                    $config = $config[$data];
                }
            }
            return $config;
        }
        return false;
    }
}
