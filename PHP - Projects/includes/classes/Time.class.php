<?php

class  time
{
    public function __construct()
    {
        //
    }
    public static function timeAgo($oldTime, $newTime)
    {
        $timeCalc = strtotime($newTime) - strtotime($oldTime);
        if ($timeCalc >= (60 * 60 * 24 * 30 * 12 * 2)) {
            $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30 / 12) . " vite m&euml; par&euml;";
        } else if ($timeCalc >= (60 * 60 * 24 * 30 * 12)) {
            $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30 / 12) . " vite m&euml; par&euml;";
        } else if ($timeCalc >= (60 * 60 * 24 * 30 * 2)) {
            $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30) . " muaj m&euml; par&euml;";
        } else if ($timeCalc >= (60 * 60 * 24 * 30)) {
            $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30) . " muaj m&euml; par&euml;";
        } else if ($timeCalc >= (60 * 60 * 24 * 2)) {
            $timeCalc = intval($timeCalc / 60 / 60 / 24) . " dit&euml; m&euml; par&euml;";
        } else if ($timeCalc >= (60 * 60 * 24)) {
            $timeCalc = " Dje";
        } else if ($timeCalc >= (60 * 60 * 2)) {
            $timeCalc = intval($timeCalc / 60 / 60) . " or&euml; m&euml; par&euml;";
        } else if ($timeCalc >= (60 * 60)) {
            $timeCalc = intval($timeCalc / 60 / 60) . " or&euml; m&euml; par&euml;";
        } else if ($timeCalc >= 60 * 2) {
            $timeCalc = intval($timeCalc / 60) . " minuta m&euml; par&euml;";
        } else if ($timeCalc >= 60) {
            $timeCalc = intval($timeCalc / 60) . " minuta m&euml; par&euml;";
        } else if ($timeCalc > 0) {
            $timeCalc .= " seconda m&euml; par&euml;";
        }
        return $timeCalc;
        // <?php "U postua  " . TimeAgo(($row['Time']), date("Y-m-d H:i:s")); 
    }

    public static function timeAgo2($timestamp)
    {
        $time_ago           = strtotime($timestamp);
        $current_time       = time();
        $time_difference    = $current_time - $time_ago;
        $seconds            = $time_difference;
        $minutes            = round($seconds / 60);           // value 60 is seconds  
        $hours              = round($seconds / 3600);         //value 3600 is 60 minutes * 60 sec  
        $days               = round($seconds / 86400);        //86400 = 24 * 60 * 60;  
        $weeks              = round($seconds / 604800);       // 7*24*60*60;  
        $months             = round($seconds / 2629440);      //((365+365+365+365+366)/5/12)*24*60*60  
        $years              = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
        if ($seconds <= 60) {
            return "Just Now";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "nj&euml; minut m&euml; par&euml;";
            } else {
                return "$minutes minuta m&euml; par&euml;";
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return "1 or&euml; m&euml; par&euml;";
            } else {
                return "$hours or&euml; m&euml; par&euml;";
            }
        } else if ($days <= 7) {
            if ($days == 1) {
                return "Dje";
            } else {
                return "$days dit&euml; m&euml; par&euml;";
            }
        } else if ($weeks <= 4.3) //4.3 == 52/12  
        {
            if ($weeks == 1) {
                return "nj&euml; jav&euml; m&euml; par&euml;";
            } else {
                return "$weeks jav&euml; m&euml; par&euml;";
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return "nj&euml;  muaj m&euml; par&euml;";
            } else {
                return "$months muaj m&euml; par&euml;";
            }
        } else {
            if ($years == 1) {
                return "Nj&euml; vite m&euml; par&euml;";
            } else {
                return "$years vit&euml; m&euml; par&euml;";
            }
        }
    }
}
