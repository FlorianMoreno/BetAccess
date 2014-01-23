<?php

if(isset($_POST['submit'])) {
	EnterKey::process(htmlentities($_POST['key']));
}

?>