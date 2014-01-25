<?php

class BetaKey {

	private $id = -1;
	private $keyStr;
	private $took;

	public static function loadByKey($key) {
		if(self::isKeyExisting($key)) {
			$instance = new self();
			$instance->keyStr = $key;
			$instance->loadFromDBWithKey();
			return $instance;
		}
	}

	public static function loadById($id) {
		if(self::isKeyIdExisting($id)) {
			$instance = new self();
			$instance->id = $id;
			$instance->loadFromDBWithId();
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
					$this->id = $row['id'];
					$this->keyStr = $row['key'];
					$this->took = $row['took'];
				}
			}
		}
	}

	private function loadFromDBWithId() {
		if($this->id >= 0) {
			$res = Database::query("SELECT * FROM `keys` WHERE `id`='".$this->id."'");
			$num = Database::countRows($res);

			if($num == 1) {
				while($row = $res->fetch()) {
					$this->id = $row['id'];
					$this->keyStr = $row['key'];
					$this->took = $row['took'];
				}
			}
		}
	}

	private function writeToDB() {
		if(isset($this->keyStr)) {
			$res = Database::query("INSERT INTO `keys` VALUES ('', '".$this->keyStr."', '')");
		}
	}

	public function setTook($took) {
		if($took == 0) {
			Database::query("UPDATE `keys` SET took=0 WHERE `key`='".$this->keyStr."'");
		}
		else {
			Database::query("UPDATE `keys` SET took=1 WHERE `key`='".$this->keyStr."'");
		}
	}

	public function delete() {
		Database::query("DELETE FROM `keys` WHERE `id`=".$this->id." AND `key`='".$this->keyStr."'");
		unset($this->id);
		unset($this->keyStr);
		unset($this->took);
	}

	public function getId() {
		return $this->id;
	}

	public function getKeyStr() {
		return $this->keyStr;
	}

	public function isAvailable() {
		return $this->took == 0;
	}


	// static utility functions
	public static function isKeyIdExisting($id) {
		$res = Database::query("SELECT * FROM `keys` WHERE `id`='".$id."'");
		return Database::countRows($res) != 0;
	}

	public static function isKeyExisting($keyStr) {
		$res = Database::query("SELECT * FROM `keys` WHERE `key`='".$keyStr."'");
		return Database::countRows($res) != 0;
	}

	public static function getAllKeys() {
		$keys = array();
		$res = Database::selectAllFieldsFromTable('keys');

		$i = 0;
		while($row = $res->fetch()) {
			$key = self::loadById($row['id']);
			$keys[$i] = $key;
			$i++;
		}

		return $keys;
	}
}

?>