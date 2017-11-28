<?php
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
error_reporting(E_ALL);

define("INC_ROOT", dirname(__DIR__) . "/cdn");
// add required files necessary for app to function
require_once dirname(INC_ROOT) . "/classes/myMailer.php";
require_once dirname(INC_ROOT) . "/classes/reservedValidator.php";
require_once dirname(INC_ROOT) . "/classes/User.php";
require_once(dirname(INC_ROOT) . "/includes/conn.php");
?>