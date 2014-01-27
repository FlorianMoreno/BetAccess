<?php

if(!isset($_SESSION['key'])) {
	header('Location: ./');
	exit();
}
else {
	$key = $_SESSION['key'];
}

if(isset($_POST['blistRegisterSubmit'])) {
	if(isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['passwordConfirm']) && isset($_POST['usernameCode'])) {
		$password = htmlentities(addslashes($_POST['password']));
		$password2 = htmlentities(addslashes($_POST['passwordConfirm']));

		if($password == $password2) {
			$username = htmlentities(addslashes($_POST['username']));
			$mail = htmlentities(addslashes($_POST['mail']));
			$usernameCode = htmlentities(addslashes($_POST['usernameCode']));

			BlacklistRegister::process($username, $mail, $password, 1, $usernameCode);
		}
		else {
			BetaConfig::setValue('last_error', 'Les mots de passe de correspondent pas !');
		}
	}
}

if(isset($_GET['delKey'])) {
	unset($_SESSION['key']);
	header('Location: ./');
	exit();
}

?>