<?php
//csrf token
class Token
{
    //Create a token
    public static function getToken() //bd9ea63646a18c9c404753d1e957cd17
    {
        return Session::put(Config::get('session/sessionToken'), md5(uniqid()));
    }

    //Check if the token is valid
    public static function checkToken($token)
    {

        $tokenName = Config::get('session/sessionToken');

        if (Session::exist($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}
