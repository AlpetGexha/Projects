<?php

require_once 'includes/ini.php';




$id = Input::get('id');

$sql = DB::getDB()->get('users', array('id', '=', $id));


$row = $sql->firstResult();

if (!$id) {
    Go::to('index.php');
} else {
    if ($row === null) {
        Go::to(404);
    }
}
echo $row->username . '<br>';
echo $row->emri;
echo $row->mbiemri . '<br>';
echo $row->email . '<br>';
