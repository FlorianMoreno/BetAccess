<?php

class BlackList {

	private static $file;
	private static $blacklistMap;

	public static function init($file) {
		self::$file = $file;
		self::loadFromFile();
	}

	private static function loadFromFile() {
		//TODO: store usernames from file in array $blacklistMap
	}

	private static function generateBlacklistKeys() {
		//TODO: generate codes from blacklisted users, and register them in DB
	}

	public static function isUsernameBlacklisted($username) {
		return in_array($username, $this->blacklistMap);
	}

}

?>