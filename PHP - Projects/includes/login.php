<?php
include_once 'includes/ini.php';
$user = new User();
if ($user->isLoggendIn()) {
    Go::to('index');
}
if (Session::exist('suksess')) {
    echo Session::flash('suksess');
}
if (Input::exist()) {
    //echo "Eksiston";
    if (Token::checkToken(Input::get('token'))) {
        $x = new Validation();
        $validate = $x->check($_POST, array(
            'username' => array(
                'req' => true,
            ),

            'password' => array(
                'req' => true
            ),
        ));

        if ($validate->passed()) {
            $u = new User();
            $login = $u->login(Input::get('username'), Input::get('password'));

            if ($login) {
                Go::to('index');
            }
        } else {
            $validate->getError();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        } //Mos u submit nese bohet refresh faqja
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <form action="" method="post">
        <div class="input">
            <label for="Username">Username</label>
            <input type="text" name="username" autofocus="" autocomplete="off" value="<?= trim(strtolower(escape(Input::get('username')))) ?>">
        </div>


        <div class="input">
            <label for="password">password</label>
            <input type="password" name="password" autocomplete="off">
        </div>

        <input type="hidden" name="token" value="<?= Token::getToken() ?>">
        <input type="submit" value="Login">
    </form>

</body>

</html>