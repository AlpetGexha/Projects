<?php
session_start();
ob_start();
	require_once "functions.php";

	if (isset($_GET['email']) && isset($_GET['token'])) {
		include ('config.php');

		$email = $db->real_escape_string($_GET['email']);
		$token = $db->real_escape_string($_GET['token']);

		$sql = $db->query("SELECT id FROM users WHERE
			email='$email' AND token='$token' AND token<>'' AND tokenExpire > NOW()
		");

		if ($sql->num_rows > 0) {
			$newPassword = generateNewString();
			$newPasswordEncrypted = password_hash($newPassword, PASSWORD_DEFAULT);
			$db->query("UPDATE users SET token='', password = '$newPasswordEncrypted'
				WHERE email='$email'
			");

			echo "Your New Password Is $newPassword<br><a href='login.php'>Click Here To Log In</a>";
		} else
			redirectToLoginPage();
	} else {
		redirectToLoginPage();
	}
?>
