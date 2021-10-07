<?php

class Config
{
    public static function get($path = null)
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
