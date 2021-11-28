<?php

/** Hashing */
class Hash
{
    /** Hashing password
     * 
     * @return PASSWORD_DEFAULT
     */
    public static function make(String $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /** Hashing uniq Password */
    public static function uniq()
    {
        return self::make(uniqid());
    }


    public static function salt(int $length)
    {
        return random_bytes($length);
    }
}
