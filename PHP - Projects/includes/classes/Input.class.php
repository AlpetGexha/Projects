<?php

/** Chek if input have GET or POST request */
class Input
{
    /** chek if input exist or not */
    public static function exist(String $item = 'post')
    {
        switch ($item) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }

        //  echo "submitedd";
    }

    /** Get $_POST or $_GET input */
    public static function get(String $item) //$_POST['username'] || $_GET['username'];
    {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        } else {
            return '';
        }
    }
}
