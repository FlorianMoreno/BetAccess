<?php

class EnterKey {

	public static function process($key) {
		Validator::validateKey($key);
	}

}

?>