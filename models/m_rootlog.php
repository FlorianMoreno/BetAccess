<?php

class RootLog {

	public static function login($pass) {
		$res = Database::query("SELECT * FROM `root` WHERE `pass`='".sha1($pass)."'");

		if(Database::countRows($res) == 1) {
			AdminSession::login();
		}
		else {
			BetaConfig::setValue('last_error', 'The root password is incorrect !');
		}
	}

}

?>