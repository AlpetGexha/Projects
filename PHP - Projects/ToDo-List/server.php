<?php
include 'database/config.php';

session_start();
ob_start();

$_SESSION['errors'] = "";

if (isset($_POST['todoButton'])) {
    $item = $_POST['todoItem'];

    $sql = "INSERT INTO todo(todoItem)
    VALUES (?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$item]);
    header("Location: index.php");
}

if (isset($_POST['todoDelete'])) {
    $id = $_POST['todoDelete'];

    $sql = "DELETE FROM todo WHERE todoID = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    header("Location:index.php");
}

function TimeAgo($oldTime, $newTime)
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
        $timeCalc .= " sekonda m&euml; par&euml;";
    }
    return $timeCalc;
}