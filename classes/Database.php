<?php

class DataBase {

	private static $pdo;

	public static function init() {
		try {
			$host = BetaConfig::getValue("DB_host");
			$user = BetaConfig::getValue("DB_username");
			$pass = BetaConfig::getValue("DB_password");
			$dbName = BetaConfig::getValue("DB_database");

			self::$pdo = new PDO('mysql:host='.$host.';dbname='.$dbName, $user, $pass);
		}
		catch(PDOException $e) {
			die("Can't connect to database ! ".$e->getMessage());
		}
	}

	public static function query($query) {
		try {
			$res = self::$pdo->query($query);
			return $res;
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public static function selectAllFieldsFromTable($table) {
		return self::$pdo->query("SELECT * FROM `".$table.'`');
	}

	public static function selectFieldsFrom($table) { // you can put as many args as you want in this function (for fields to select)
		$sql_table = '`'.$table.'`';
		$fields = array();
		$sql_fields = '';

		if(func_num_args() >= 2) {
			for($i = 0; $i < func_num_args(); $i++) {
				if($i != 0) {
					$fields[$i - 1] = func_get_arg($i);
				}
			}
		}

		for($i = 0; $i < count($fields); $i++) {
			$oldField = $fields[$i];
			$newField = '`'.$oldField.'`';
			$fields[$i] = $newField;
		}

		$sql_fields = implode(',', $fields);

		return self::$pdo->query("SELECT ".$sql_fields." FROM ".$sql_table);
	}

	public static function countRows($query) {
		return $query->rowCount();
	}

	public static function close() {
		self::$pdo = null;
	}
}

?>