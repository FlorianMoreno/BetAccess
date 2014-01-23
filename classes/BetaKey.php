<?php

class BetaKey {

	private $id = -1;
	private $keyStr;

	public static function create($id) {
		if(!self::isKeyIdExisting($id)) {
			$instance = new self();
			$instance->id = $id;
			$instance->generate();

			return $instance;
		}
	}

	public static function get($id) {
		if (self::isKeyIdExisting($id)) {
			$instance = new self();
			$instance->loadFromDB();
			return $instance;
		}
	}

	private function generate() {
		//TODO: generate random key and store it in DB
	}

	private function loadFromDB() {
		//TODO: load key from DB using it's id
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
}

?>