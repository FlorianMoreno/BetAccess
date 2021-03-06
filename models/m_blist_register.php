<?php

class BlacklistRegister {

	public static function process($user, $mail, $pass, $rank, $userCode) {
		$key = $_SESSION['key'];
		$user = htmlentities(addslashes($user));
		$mail = htmlentities(addslashes($mail));
		$pass = htmlentities(addslashes(md5($pass)));
		$rank = htmlentities(addslashes($rank));
		$userCode = htmlentities(addslashes($userCode));

		$host = BetaConfig::getValue('RegDB_host');
		$dbUser = BetaConfig::getValue('RegDB_username');
		$dbPass = BetaConfig::getValue('RegDB_password');
		$dbName = BetaConfig::getValue('RegDB_database');
		$regDb = new PDO('mysql:host='.$host.';dbname='.$dbName, $dbUser, $dbPass);
		$time = time();

		$checkUsername = $regDb->query("SELECT * FROM `users` WHERE `username`='".$user."'");

		if(!BlackList::isUsernameBlacklisted($user)) {
			header('Location: ./?action=register');
			return;
		}
		else {
			if(!BlackList::isUserCodeValid($userCode, $user)) {
				BetaConfig::setValue('last_error', 'Ce code utilisateur n\'est pas valide !');
				return;
			}
		}

		if($checkUsername->rowCount() != 0) {
			BetaConfig::setValue('last_error', 'Ce nom d\' utilisateur est déjà occupé !');
			return;
		}
		else {
			$checkMail = $regDb->query("SELECT * FROM `users` WHERE `email`='".$mail."'");

			if($checkMail->rowCount() != 0) {
				BetaConfig::setValue('last_error', 'Cet adresse mail est déjà occupée !');
				return;
			}
			else {
				$res = $regDb->query("INSERT INTO `users` VALUES('', '".$user."', '".$mail."', '".$pass."', '', '', '', '".$time."', '".$_SERVER['REMOTE_ADDR']."', '".$_SERVER['REMOTE_ADDR']."', '".$rank."')");

				if($res->rowCount() > 0) {
					$keyObject = BetaKey::loadByKey($key);

					if($keyObject->isAvailable()) {
						BetaConfig::setValue('last_success', 'Inscription terminée, connectez-vous <a href='.BetaConfig::getValue('projectLocation').'>ici</a>');
						$keyObject->setTook(1);
						unset($_SESSION['key']);
						return;
					}
					else {
						BetaConfig::setValue('last_error', 'Cette clé n\' est plus disponible');
						return;	
					}
				}
				else {
					BetaConfig::setValue('last_error', 'Une erreur est survenue lors de l\' inscription');
					return;
				}
			}
		}
	}

}

?>