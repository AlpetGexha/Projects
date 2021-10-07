<?php include_once 'includes/ini.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php
    // echo Input::get('username');
    if (Session::exist('suksess')) {
        echo Session::flash('suksess');
    }
    if (Input::exist()) {
        if (Token::checkToken(Input::get('token'))) {
            $x = new Validation();
            $x->check($_POST, array(
                'emri' => array(
                    'req' => true,
                    'min' => 3,
                    'max' => 40
                ),
                'mbiemri' => array(
                    'req' => true,
                    'min' => 3,
                    'max' => 40
                ),

                'username' => array(
                    'req' => true,
                    'min' => 3,
                    'max' => 40,
                    'uniq' => 'users'
                ),
                'email' => array(
                    'req' => true,
                    'email' => true,
                    'uniq' => 'users'
                ),
                'password' => array(
                    'req' => true,
                    'min' => 6
                ),

                'continuePassword' => array(
                    'req' => true,
                    'match' => 'password'

                )

            ));
            if ($x->passed()) {
                // echo "passed";
                //Session::flash('success', 'U regjistruat me sukses');
                //header('Location: index.php');

                Session::flash('suksess', 'U krijua me sukses');
                header('Location: register.php');
                $u = new User();
                $u->create(array(

                    'emri' =>  ucfirst(Input::get('emri')),
                    'mbiemri' => ucfirst(Input::get('mbiemri')),
                    'username' => trim(strtolower(Input::get('username'))),
                    'email' => Input::get('email'),
                    'password' => Hash::make(Input::get('password')),


                ));
            } else {
                $x->getError();
            }
        }
    }


    ?>
    <form action="" method="post">

        <div class="input">
            <label for="name">Emri</label>
            <input type="text" name="emri" id="emri" value="<?= ucfirst(escape(Input::get('emri'))) ?>" />
        </div>
        <div class="input">
            <label for="mbiemri">Mbiemri</label>
            <input type="text" name="mbiemri" id="mbiemri" value="<?= ucfirst(escape(Input::get('mbiemri'))) ?>" />
        </div>

        <div class="input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= trim(strtolower(escape(Input::get('username')))) ?>" autocomplete="off" />
        </div>

        <div class="input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= escape(Input::get('email')) ?>" />
        </div>

        <div class="input">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" />
        </div>

        <div class="input">
            <label for="continuePassword">Reshruaj passwordin</label>
            <input type="password" id="continuePassword" name="continuePassword" />
        </div>

        <input type="hidden" name="token" value="<?= Token::getToken() ?>" />
        <input type="submit" value="Register" />

    </form>
</body>

</html>