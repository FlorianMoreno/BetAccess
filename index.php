<?php

require_once('classes/BetaConfig.php');
require_once('classes/Blacklist.php');
require_once('classes/BetaKey.php');
require_once('classes/Validator.php');

BetaConfig::init();
Blacklist::init('blacklists/main.txt');

$model = 'models/m_enterkey.php';
$controller = 'controllers/c_enterkey.php';
$view = 'views/v_enterkey.php';

if(!empty($_GET['action'])) {
	$action = htmlentities($_GET['action']);

	switch($action) {
		case 'enterkey':
			$model = 'models/m_enterkey.php';
			$controller = 'controllers/c_enterkey.php';
			$view = 'views/v_enterkey.php';
			break;
	}
}

include 'views/_top.php';
include $model;
include $controller;
include $view;
include 'views/_btm.php';

?>
