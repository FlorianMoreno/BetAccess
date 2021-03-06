<?php

if(!isset($_SESSION['key'])) {
	header('Location: ./');
	exit();
}
else {
	$key = $_SESSION['key'];
}

if(isset($_POST['registerSubmit'])) {
	if(isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])) {
		$password = htmlentities(addslashes($_POST['password']));
		$password2 = htmlentities(addslashes($_POST['passwordConfirm']));

		if($password == $password2) {
			$username = htmlentities(addslashes($_POST['username']));
			$mail = htmlentities(addslashes($_POST['mail']));

			Register::process($username, $mail, $password, 1);
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