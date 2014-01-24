<?php

class BetaKey {

	private $id = -1;
	private $keyStr;

	public static function load($key) {
		if(self::isKeyExisting($key)) {
			$instance = new self();
			$instance->keyStr = $key;
			$instance->loadFromDBWithKey();
			return $instance;
		}
	}

	public static function create($key) {
		if(!self::isKeyExisting($key)) {
			$instance = new self();
			$instance->keyStr = $key;	
			$instance->writeToDB();
			return $instance;
		}
	}

	private function loadFromDBWithKey() {
		if(isset($this->keyStr)) {
			$res = Database::query("SELECT * FROM `keys` WHERE `key`='".$this->keyStr."'");
			$num = Database::countRows($res);

			if($num == 1) {
				while($row = $res->fetch()) {
					echo $row['key'];
				}
			}
		}
	}

	private function writeToDB() {
		if(isset($this->keyStr)) {
			$res = Database::query("INSERT INTO `keys` VALUES ('', '".$this->keyStr."', '')");
		}
	}

	private function setTook($took) {
		if($took == 0) {
			Database::query("UPDATE `keys` SET took=0 WHERE `key`='".$this->keyStr."'");
		}
		else {
			Database::query("UPDATE `keys` SET took=1 WHERE `key`='".$this->keyStr."'");
		}
	}


	// static utility functions
	public static function generateKeys() {
		$key1 = self::create("keykey");
		$key1 = self::create("xavier");
	}

	public static function isKeyIdExisting($id) {
		$res = Database::query("SELECT * FROM `keys` WHERE `id`='".$id."'");
		return Database::countRows($res) != 0;
	}

	public static function isKeyExisting($keyStr) {
		$res = Database::query("SELECT * FROM `keys` WHERE `key`='".$keyStr."'");
		return Database::countRows($res) != 0;
	}

	public static function isKeyIdAlreadyTook($id) {
		$res = Database::query("SELECT * FROM `keys` WHERE `id`='".$id."' AND took=1");
		return Database::countRows($res) != 0;
	}

	public static function isKeyAvailable($keyStr) {
		$res = Database::query("SELECT * FROM `keys` WHERE `key`='".$keyStr."' AND took=0");
		return Database::countRows($res) != 0;
	}
}

?>