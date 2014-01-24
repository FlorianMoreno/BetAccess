<?php

class Validator {

	public static function validateName($user) {
		$blacklisted = Blacklist::isUsernameBlacklisted($user);
	}

	public static function validateKey($key) {
		$keyExisting = BetaKey::isKeyExisting($key);

		if($keyExisting) {
			if(BetaKey::isKeyAvailable($key)) {
				BetaConfig::setValue('last_success', 'Your key is valid !');
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