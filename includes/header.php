<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php'); ?>
<?php // check user login if logged in get information if not redirect to login page.
		if(isset($_SESSION["id"]) || isset($_COOKIE["idx"])){
			// user is logged in query database to get information.
			if($_SESSION['id'] != null){
				$id = $_SESSION['id'];
			}else{
				$id = $_COOKIE['idx'];
			}
			$user = new User($DB_conn);
			$user->getUser($id);
		}else{
			// user is not logged in redirect to login page if current page isnt the login page.
			if($_SERVER["PHP_SELF"] != "/login.php"){
				$url = '/login.php';
				echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
			}
		}
		
		if($_SERVER["PHP_SELF"] != "/login.php" || $_SERVER["PHP_SELF"] != "/registration.php"){
				$url = '/login.php';
				echo '<META HTTP-EQUIV="refresh" content="0;URL=' .$url. '">';
			}
		
		?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Spotter - Business &amp; Appointment Management Software</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" href="/css/application.css" type="text/css" media="screen" />
	</head>
	<body>
		<noscript>Javascript is disabled. Please enable javascript in your browser to enhance user experience and to take full advantage of the app features.</noscript>
		<header>
			<h1>Spotter&nbsp;<span>Appointment Management Utility</span></h1>
			<? if(isset($_SESSION['id']) || isset($_COOKIE['idx'])){
				require($_SERVER['DOCUMENT_ROOT'] . '/includes/userHeader.php');
			}
			?>
		</header>
		<section>