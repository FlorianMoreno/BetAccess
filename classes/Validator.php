<?php

require_once('Config.php');
require_once('Blacklist.php');
require_once('BetaKey.php');

class Validator {

	public static function validateName($user) {
		$blacklisted = Blacklist::isUsernameBlacklisted($user);
	}

	public static function validateKey($key) {
		$keyExisting = BetaKey::isKeyExisting($key);

		if($keyExisting) {

		}
		else {
			Config::setValue('last_error', 'The entered key is not valid !');
			header('Location: ./');
		}
	}

}

?>