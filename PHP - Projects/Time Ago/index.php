<?php
function TimeAgo($oldTime, $newTime)
{
    $timeCalc = strtotime($newTime) - strtotime($oldTime);
    if ($timeCalc >= (60 * 60 * 24 * 30 * 12 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30 / 12) . " years m&euml; par&euml;";
    } else if ($timeCalc >= (60 * 60 * 24 * 30 * 12)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30 / 12) . " year m&euml; par&euml;";
    } else if ($timeCalc >= (60 * 60 * 24 * 30 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30) . " months m&euml; par&euml;";
    } else if ($timeCalc >= (60 * 60 * 24 * 30)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24 / 30) . " month m&euml; par&euml;";
    } else if ($timeCalc >= (60 * 60 * 24 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60 / 24) . " days m&euml; par&euml;";
    } else if ($timeCalc >= (60 * 60 * 24)) {
        $timeCalc = " Dje";
    } else if ($timeCalc >= (60 * 60 * 2)) {
        $timeCalc = intval($timeCalc / 60 / 60) . " hours m&euml; par&euml;";
    } else if ($timeCalc >= (60 * 60)) {
        $timeCalc = intval($timeCalc / 60 / 60) . " hour m&euml; par&euml;";
    } else if ($timeCalc >= 60 * 2) {
        $timeCalc = intval($timeCalc / 60) . " minutes m&euml; par&euml;";
    } else if ($timeCalc >= 60) {
        $timeCalc = intval($timeCalc / 60) . " minute m&euml; par&euml;";
    } else if ($timeCalc > 0) {
        $timeCalc .= " seconds m&euml; par&euml;";
    }
    return $timeCalc;
}

echo "U postua  " . TimeAgo($row['date'], date("Y-m-d H:i:s"));

// <?php "U postua  " . TimeAgo(($row['Time']), date("Y-m-d H:i:s")); ?>
?>