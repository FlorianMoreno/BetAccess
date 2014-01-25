<?php

class AdminSession {

	public static function login() {
		$_SESSION['username'] = 'root';
		header('Location: ./?action=admin');
	}

	public static function logout() {
		session_destroy();
	}

	public static function isLogged() {
		if(!isset($_SESSION['username'])) return false;

		return $_SESSION['username'] == 'root';
	}

}

?>