<?php

class Validator {

	public static function validateName($user) {
		$blacklisted = Blacklist::isUsernameBlacklisted($user);
	}

	public static function validateKey($keyStr) {
		$keyExisting = BetaKey::isKeyExisting($keyStr);

		if($keyExisting) {
			$key = BetaKey::loadByKey($keyStr);

			if($key->isAvailable()) {
				BetaConfig::setValue('last_success', 'Your key is valid !');
				$_SESSION['key'] = $key->getKeyStr();
			}
			else {
				BetaConfig::setValue('last_error', 'The key you entered is not available anymore !');	
			}
		}
		else {
			BetaConfig::setValue('last_error', 'The entered key is not valid !');
		}
	}

}

?>