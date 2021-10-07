<?php
class Input
{
    //chek if input exist or not
    public static function exist($item = 'post')
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

    // get Input name
    public static function get($item) //$_POST['username'] || $_GET['username'];
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
