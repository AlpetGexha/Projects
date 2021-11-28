<?php

/** Sessionet
 * @method get();
 * @method put();
 * @method exist();
 * @method delete();
 * @method flash();
 */
class Session
{
    /** create session */
    public static function get(String $name)
    {
        return $_SESSION[$name];
    }

    /** equal session */
    public static function put(String $name, $value)
    {
        //sesioni                //vlera "md5(uniqid()));"
        return $_SESSION[$name] = $value;
    }

    /** check if session is set */
    public static function exist(String $name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    /** Delete session who is set (unset)*/
    public static function delete(String $name)
    {
        if (self::exist($name)) {
            unset($_SESSION[$name]);
        }
    }

    /** Show return only one time */
    public static function flash(mixed $name, String $string = '')
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
