<?php require_once("../includes/init.php");
$user = new User($DB_conn);
if(isset($_POST["requestType"]) || isset($_GET["requestType"])){
	if($_POST["requestType"] == "register"){
	$user->Register($_POST);
	}else if($_POST["requestType"] == "login"){
	$user->Login($_POST);
	}else/*($_GET["requestType"] == "logout")*/{
	$user->Logout();
	}
}else{
	echo "ERROR: Unable to process request please contact system administrator.";
}

?>