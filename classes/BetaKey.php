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
		//TODO: return true is DB contains a key with id == $id
	}

	public static function isKeyExisting($keyStr) {
		//TODO: return true if a key similar to $keyStr exists in DB
	}
}

?>