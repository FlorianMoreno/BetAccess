<?php

if(AdminSession::isLogged()) {
	header('Location: ./?action=admin');
	exit();
}

if(isset($_POST['submit_rootlog'])) {
	if(isset($_POST['root_pass'])) {
		$pass = htmlentities(mysql_real_escape_string($_POST['root_pass']));
		RootLog::login($pass);
	}
}

?>