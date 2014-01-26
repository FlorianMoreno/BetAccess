<?php

class BlackList {

	private static $file;
	private static $blacklistMap;

	public static function init($file) {
		self::$file = $file;
		self::loadFromFile();
		self::generateBlacklistKeys();
	}

	private static function loadFromFile() {
		$lines = file(self::$file, FILE_IGNORE_NEW_LINES);
		$line = strtolower($lines[0]);
		self::$blacklistMap = explode(';', $line);
	}

	private static function generateBlacklistKeys() {
		for($i = 0; $i < count(self::$blacklistMap); $i++) {
			$name = strtolower(self::$blacklistMap[$i]);
			$res = Database::query("SELECT * FROM `blacklist` WHERE `username`='".$name."'");

			if($res->rowCount() != 0) {
				$checkCode = Database::query("SELECT * FROM `blacklist` WHERE `username`='".$name."' AND `code`='000000'");

				if($checkCode->rowCount() != 0) {
					Database::query("UPDATE `blacklist` SET `code`='".self::generateCode()."' WHERE `username`='".$name."'");
				}
			}
			else {
				$ins = Database::query("INSERT INTO `blacklist` VALUES ('', '".$name."', '".self::generateCode()."')");
			}
		}
	}

	private static function generateCode() {
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = '';

		for ($i = 0; $i < 6; $i++) {
			$code .= $chars[rand(0, strlen($chars) - 1)];
		}

		return $code;
	}

	public static function isUsernameBlacklisted($username) {
		return in_array($username, self::$blacklistMap);
	}

	public static function isUserCodeValid($code, $user) {
		$res = Database::query("SELECT * FROM `blacklist` WHERE `username`='".strtolower($user)."' AND `code`='".$code."'");
		return $res->rowCount() == 1;
	}

}

?>