<?php
require_once("../includes/init.php");
$user = new User($DB_conn);

if($_POST['requestType'] == "register"){
	$user->Register($_POST['loginName'], $_POST['loginKey'], $_POST['userType']);
}else if($_POST['requestType'] == "login"){
	$user->Login();
}else{
	echo "ERROR: Unable to process request please contact system administrator.";
}
?>