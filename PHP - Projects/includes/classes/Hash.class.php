<?php

class Hash
{

    public static function make($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function uniq()
    {
        return self::make(uniqid());
    }


    public static function salt($length)
    {
        return random_bytes($length);
    }
}
