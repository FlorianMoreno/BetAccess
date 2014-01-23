<?php

if(isset($_POST['submit'])) {
	$key = htmlentities($_POST['submit']);
	EnterKey::process($key);
}

?>