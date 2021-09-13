<?php
$msg = "";
include 'config.php';

class ContactData extends DB
{
    public function insertData($body)
    {
        $sql = "INSERT INTO kontakti (contactBody) 
                    VALUES (?)";
        $stml = $this->openDB()->prepare($sql);
        $stml->execute([$body]);
        return true;
    }
}

$obj = new ContactData();

if (isset($_POST['contactSubmit'])) {

    $contactBody = $_POST['contactBody'];

    if ($obj->insertData($contactBody)) {
        echo  "Mesazhi u dergua me sukses";
        header('Location: index.php');
    } else {
        echo "Nuk pati sukes! Profoni p&euml;rs&euml;ri";
    }
}
