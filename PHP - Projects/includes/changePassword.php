<?php
include 'includes/ini.php';

$x = new User();

if (!$x->isLoggendIn()) {
    Go::to('index');
}

if (Input::exist()) {
    if (Token::checkToken(Input::get('token'))) {
        $y = new Validation();
        $validata =  $y->check($_POST, array(
            'password' => array(
                'req' => true,
                'min' => 6
            ),
            'newPassword' => array(
                'req' => true,
                'min' => 6,
            ),
            'continuePassword' => array(
                'req' => true,
                'min' => 6,
                'match' => 'newPassword'
            )
        ));

        if ($validata->passed()) {

            if (Hash::make(Input::get('password')) === $x->data()->password) {
                $x->update(array(
                    'password' => Hash::make(Input::get('newPassword'))
                ));

                Session::flash('password', 'Passwordi u ndryshua me sukses');
                Go::to('index.php');
            } else {
                echo "Passwordi momental është gabim";
            }
        } else
            $validata->getError();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password </title>
</head>

<body>

    <form action="" method="post">
        <div class="input">
            <label for="password">Passwordi Momental</label>
            <input type="password" name="password" />
        </div>

        <div class="input">
            <label for="newPassword">Passwordin e ri</label>
            <input type="password" name="newPassword" />
        </div>
        <div class="input">
            <label for="continuePassword">Reshruaj passwordin</label>
            <input type="password" name="continuePassword" />
        </div>


        <input type="hidden" name="token" value="<?= Token::getToken() ?>" />
        <input type="submit" value="Update" />
    </form>

</body>

</html>