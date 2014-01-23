<?php

class Config {

	private static $defaultConfig = array(
		'projectName' => 'DreamVids',
		'DB_host' => '127.0.0.1',
		'DB_username' => 'root',
		'DB_password' => '',
		'DB_database' => 'dreambeta'
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