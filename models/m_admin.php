<?php

class Admin {

	public static function addNewKey($newKeyStr) {
		if($newKeyStr != '' && strlen($newKeyStr) > 5) {
			$newKey = BetaKey::create($newKeyStr);
		}
	}

	public static function deleteKeyById($id) {
		$keyToDelete = BetaKey::loadById($id);

		if(isset($keyToDelete)) {
			$keyToDelete->delete();
			unset($keyToDelete);
		}
	}

}

?>