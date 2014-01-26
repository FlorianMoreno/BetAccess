<?php

class BetaConfig {

	private static $defaultConfig = array(
		// main settings
		'projectName' => 'DreamVids',
		'projectLocation' => 'http://dreamvids.fr',

		// main DB
		'DB_host' => '127.0.0.1',
		'DB_username' => 'root',
		'DB_password' => '',
		'DB_database' => 'betaccess',

		// register DB
		'RegDB_host' => '127.0.0.1',
		'RegDB_username' => 'root',
		'RegDB_password' => '',
		'RegDB_database' => 'dreamvids',

		// error/success
		'last_error' => 'nope',
		'last_success' => 'nope'
	);


	private static $configMap;

	public static function init() {
		self::$configMap = self::$defaultConfig;
	}

	public static function getValue($key) {
		return self::$configMap[$key];
	}

	public static function setValue($key, $value) {
		self::$configMap[$key] = $value;
	}

}

?>