<?php

class Validator {

	public static function validateName($user) {
		$blacklisted = Blacklist::isUsernameBlacklisted($user);
	}

	public static function validateKey($key) {
		$keyExisting = BetaKey::isKeyExisting($key);

		if($keyExisting) {
			BetaConfig::setValue('last_success', 'Your key is valid !');
		}
		else {
			BetaConfig::setValue('last_error', 'The entered key is not valid !');
		}
	}

}

?>