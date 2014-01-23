<?php

include('classes/Config.php');
include('classes/Blacklist.php');

Config::init();
Blacklist::init('blacklists/main.txt');

$model = 'models/m_enterkey.php';
$ctrlr = 'controllers/c_enterkey.php';
$view = 'views/v_enterkey.php';

if(!empty($_GET['action'])) {
	$action = htmlentities($_GET['action']);

	switch($action) {
		case 'enterkey':
			$model = 'models/m_enterkey.php';
			$ctrlr = 'controllers/c_enterkey.php';
			$view = 'views/v_enterkey.php';
			break;
	}
}

?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href='css/style.css'>

		<title><?php echo Config::getValue('projectName'); ?> - Bêta</title>
	</head>

	<body>
		<div id="header">
			<img src="img/logo.png">
		</div>

		<br>

		<?php
			include $model;
			include $ctrlr;
			include $view;
		?>

		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>