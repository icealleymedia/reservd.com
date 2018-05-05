<?php
	set_include_path( get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/New' );
	//$siteRoot = dirname(__DIR__) . '/New';
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	echo $_SERVER["DOCUMENT_ROOT"];
	require('DB_Config.php');
	require('classes/User.php');

	$user = new User($DB_con);

?>