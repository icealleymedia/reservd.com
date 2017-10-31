<?php
require_once('includes/init.php');
	// start php session to allow the session golobal variable to be used
	session_start();

	// check user login if logged in get information if not redirect to login page.
	
		if(isset($_SESSION["id"]) || isset($_COOKIE["idx"])){
			// user is logged in query database to get information.

		}else{
			// user is not logged in redirect to login page if current page isnt the login page.
			if($_SERVER["PHP_SELF"] != "/login.php"){

				header("location: login.php");
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>?</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" href="css/application.css" type="text/css" media="screen" />
	</head>
	<body>
		<noscript>Javascript is disabled. Please enable javascript to enhance experience and to take full advantage of the app.</noscript>
		<header>
			<h1>Reservation App</h1>
		</header>
		<section>