<?php

session_start();

require_once('classes/BetaConfig.php');
require_once('classes/Blacklist.php');
require_once('classes/BetaKey.php');
require_once('classes/Validator.php');
require_once('classes/Database.php');
require_once('classes/AdminSession.php');

BetaConfig::init();
Database::init();
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
		case 'register':
			$model = 'models/m_register.php';
			$controller = 'controllers/c_register.php';
			$view = 'views/v_register.php';
			break;
		case 'blist_register':
			$model = 'models/m_blist_register.php';
			$controller = 'controllers/c_blist_register.php';
			$view = 'views/v_blist_register.php';
			break;
		case 'admin':
			$model = 'models/m_admin.php';
			$controller = 'controllers/c_admin.php';
			$view = 'views/v_admin.php';
			break;
		case 'admin_login':
			$model = 'models/m_rootlog.php';
			$controller = 'controllers/c_rootlog.php';
			$view = 'views/v_rootlog.php';
			break;
		case 'admin_logout':
			AdminSession::logout();
			header('Location: ./');
			break;
	}
}

include 'views/_top.php';
include $model;
include $controller;
include $view;
include 'views/_btm.php';


?>
