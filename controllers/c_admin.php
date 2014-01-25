<?php

if(!AdminSession::isLogged()) {
	header('Location: ./');
	exit();
}

if(isset($_GET['key_to_del'])) {
	if(AdminSession::isLogged()) {
		$keyId = mysql_real_escape_string(htmlentities($_GET['key_to_del']));
		Admin::deleteKeyById($keyId);
		header('Location: ./?action=admin');
	}
}

if(isset($_POST['addKeySubmit'])) {
	if(isset($_POST['newKey'])) {
		$newKeyStr = htmlentities(mysql_real_escape_string($_POST['newKey']));
		Admin::addNewKey($newKeyStr);
	}
}


?>