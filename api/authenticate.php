<?php require_once("../includes/init.php");
$user = new User($DB_conn);
if($_POST["requestType"] == "register"){
	$user->Register($_POST);
}else if($_POST["requestType"] == "login"){
	$user->Login($_POST);
}else if($_POST["requestType"] == "logout"){
	$user->Logout();
}else{
	echo "ERROR: Unable to process request please contact system administrator.";
}
?>