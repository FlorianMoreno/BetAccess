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
				BetaConfig::setValue('last_success', 'Clé valide !');
				$_SESSION['key'] = $key->getKeyStr();
				header('Location: ./?action=register');
			}
			else {
				BetaConfig::setValue('last_error', 'Cette clé n\'est plus disponible !');	
			}
		}
		else {
			BetaConfig::setValue('last_error', 'Cette clé n\'est pas valide !');
		}
	}

}

?>