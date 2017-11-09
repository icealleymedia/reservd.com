<?php
require_once("../includes/init.php");

$user = new User($DB_conn);

$user->Register($_POST['loginName'], $_POST['loginKey'], $_POST['loginLevel']);
?>