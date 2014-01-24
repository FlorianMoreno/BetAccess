<?php

class Admin {

	public static function deleteKeyById($id) {
		$keyToDelete = BetaKey::loadById($id);

		if(isset($keyToDelete)) {
			$keyToDelete->delete();
			unset($keyToDelete);
		}
	}

}

?>