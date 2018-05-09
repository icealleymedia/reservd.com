<?php
	define("APP_DEBUG", false); // change to true for application to display all errors and created variables and there values
	if(APP_DEBUG == true){
		ini_set('display_errors', 'On');
		error_reporting(E_ALL);
	}
	set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/New' );
	//$siteRoot = dirname(__DIR__) . '/New';
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	echo $_SERVER["DOCUMENT_ROOT"];
	require_once('DB_Config.php');
	require_once('libs/PHPMailer/src/Exception.php');
	require_once('libs/PHPMailer/src/PHPMailer.php');
	require_once('libs/PHPMailer/src/SMTP.php');
	require_once('libs/Valitron/src/Validator.php');
	require_once('classes/User.php');

	$user = new User($DB_con);

?>