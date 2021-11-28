<?php

/** 
 * 
 * @method   Number::generate();             ef3UN79%H8acG$YuVdL&
 * @method   Number::geneateChar();          rRhqpVyjtzWgNBmZnPOF
 * @method   Number::geneateCharNum();       acPSAYq8dnh1rlBiv5xj
 * @method   Number::geneateCharSymbol();    FOfrwqkd?vlKxWpagstY
 * @method   Number::geneateNum();           zRYTGhLSOtNbv!rIx&k%
 * @method   Number::geneateNumSymbol();     ^8$31?560#97%4!&*2@

 */
class Number
{

    public static $bigChar = "QWERTYUIOPASDFGHJKLZXCVBNM";
    public static  $smallChar = "qwertyuiopasdfghjklzxcvbnm";
    public static $num = "1234567890";
    public static $symbol = "!@#$%^&*?";


    public function  __construct()
    {
    }
    public static function getTokenElement(mixed $element, int $len = 20)
    {
        $token = $element;
        $token = str_shuffle($token);
        $token = substr($token, 0, $len);
        return $token;
        //  echo $token . "<br>";
    }
    /** generateRandom - ef3UN79%H8acG$YuVdL& */
    public static function generate() //ef3UN79%H8acG$YuVdL&
    {
        $token = self::$bigChar . self::$smallChar . self::$num . self::$symbol;
        self::getTokenElement($token);
    }

    /** Generate Charset - rRhqpVyjtzWgNBmZnPOF */
    public static function geneateChar() //rRhqpVyjtzWgNBmZnPOF
    {
        $token = self::$bigChar . self::$smallChar;
        self::getTokenElement($token);
    }

    /** Generate Charset and Number - acPSAYq8dnh1rlBiv5xj */
    public static function geneateCharNum() //acPSAYq8dnh1rlBiv5xj
    {
        $token = self::$bigChar . self::$smallChar . self::$num;
        self::getTokenElement($token);
    }

    /** Generate Charset and Symbol - vlKxWpagstY */
    public static function geneateCharSymbol() //FOfrwqkd?vlKxWpagstY
    {
        $token = self::$bigChar . self::$smallChar . self::$symbol;
        self::getTokenElement($token);
    }

    /** Generate Number and Symbol - zRYTGhLSOtNbv */
    public static function geneateNumSymbol() //zRYTGhLSOtNbv!rIx&k%
    {
        $token = self::$num . self::$symbol;
        self::getTokenElement($token);
    }

    public static function geneateNum() //^8$31?560#97%4!&*2@
    {
        $token = self::$bigChar . self::$smallChar . self::$symbol;
        self::getTokenElement($token);
    }
}
