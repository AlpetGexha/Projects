<?php
include_once 'includes/ini.php';

$x = new User();

if (!$x->isLoggendIn()) {
    Go::to('index.php');
}


if (Input::exist()) {
    if (Token::checkToken(Input::get('token'))) {
        $y = new Validation();
        $validation = $y->check($_POST, array(
            'emri' => array(
                'req' => true,
                'min' => 2,
                'max' => 50
            ),
            'mbiemri' => array(
                'req' => true,
                'min' => 2,
                'max' => 50
            )
        ));

        if ($validation->passed()) {
            try {
                $x->update(array(

                    'emri' => ucfirst(Input::get('name')),
                    'mbiemri' => ucfirst(Input::get('mbiemri')),

                ));

                Session::flash('update', 'Update Suksess');
                Go::to('index.php');
                //
            } catch (Expired $r) {
                die($r->getMessage);
            }
        } else {
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>

    <form action="" method="post">


        <div class="input">
            <label for="name">Emri</label>
            <input type="text" name="emri" id="emri" value="<?= ucfirst(escape($x->data()->emri)) ?>" />
        </div>
        <div class="input">
            <label for="mbiemri">Mbiemri</label>
            <input type="text" name="mbiemri" id="mbiemri" value="<?= ucfirst((escape($x->data()->mbiemri))) ?>" />
        </div>

        <input type="hidden" name="token" value="<?= Token::getToken() ?>" />
        <input type="submit" value="Update" />

    </form>

</body>

</html>