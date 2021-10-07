<?php

class Session
{
    //create session
    public static function get($name)
    {
        return $_SESSION[$name];
    }

    public static function put($name, $value)
    {
        //sesioni                //vlera "md5(uniqid()));"
        return $_SESSION[$name] = $value;
    }

    //check if session is set
    public static function exist($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    //Delete session who is set
    public static function delete($name)
    {
        if (self::exist($name)) {
            unset($_SESSION[$name]);
        }
    }

    //shwo string  if page has refresh   string will be diabled
    public static function flash($name, $string = '')
    {
        if (self::exist($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
    }
}
