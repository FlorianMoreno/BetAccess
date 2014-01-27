<?php

if(AdminSession::isLogged()) {
	header('Location: ./?action=admin');
	exit();
}

if(isset($_POST['submit_rootlog'])) {
	if(isset($_POST['root_pass'])) {
		$pass = htmlentities(addslashes($_POST['root_pass']));
		RootLog::login($pass);
	}
}

?>