<?php
error_reporting(E_ALL);
session_start();

define("INC_ROOT", dirname(__DIR__) . "/cdn");

spl_autoload_register(function($class){
	require_once dirname(INC_ROOT) . "/classes/{$class}.php";
});

require_once(dirname(INC_ROOT) . "/includes/conn.php");
?>