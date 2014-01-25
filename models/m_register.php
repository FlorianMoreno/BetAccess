<?php

class Register {

	public static function process($user, $mail, $pass, $productor) {
		$user = htmlentities(mysql_real_escape_string($user));
		$mail = htmlentities(mysql_real_escape_string($mail));
		$pass = htmlentities(mysql_real_escape_string($pass));
		$productor = htmlentities(mysql_real_escape_string($productor));

		Databse::query("INSERT INTO `users` VALUES('', '', '', '', '', '', '', '', '', '', '')");
	}

}

?>