<?php
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
error_reporting(E_ALL);
define("THIS_DOMAIN", "https://cdn.icealleymedia.com");
define("INC_ROOT", dirname(__DIR__) . "/cdn");
// add required files necessary for app to function
require_once(dirname(INC_ROOT) . "/includes/conn.php");
require_once dirname(INC_ROOT) . "/classes/response.php";
require_once dirname(INC_ROOT) . "/classes/myMailer.php";
require_once dirname(INC_ROOT) . "/classes/reservedValidator.php";
require_once dirname(INC_ROOT) . "/classes/User.php";
$match_regex  = '/application\/json/i';
$request_type = ( (isset($_SERVER['CONTENT_TYPE']) && strtolower($_SERVER['CONTENT_TYPE']) == 'application/json') || (isset($_SERVER['HTTP_ACCEPT']) && preg_match($match_regex, $_SERVER['HTTP_ACCEPT']))) ? 'json' : 'html';
define("DATA_REQUEST", $request_type);
session_start();
?>