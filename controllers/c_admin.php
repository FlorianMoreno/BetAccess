<?php

if(isset($_GET['key_to_del'])) {
	$keyId = mysql_real_escape_string(htmlentities($_GET['key_to_del']));
	Admin::deleteKeyById($keyId);
}


?>