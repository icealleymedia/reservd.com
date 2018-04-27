<?php
	if($_SERVER['REQUEST_URI'] != "index.php");
		if(session_status() == PHP_SESSION_NONE){
			session_start();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Spotter - Business &amp; Appointment Management Service</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" href="/css/application.css" type="text/css" media="screen" />
	</head>
	<body>
		<header id="header">
			<ul class=nav>
				<li><a href="#home" title="About">What's Spotter?</a></li>
				<li><a href="#plans" title="Promo">Plans</a></li>
				<li><a href="#clients" title="Clientele">Clientele</a></li>
				<li><a href="#aboutus" title="About Us">About Us</a></li>
				<li><a href="#contact" title="Contact">Contact Us</a></li>
			</ul>
			
			<h1>Spotter Business &amp; Appointment Service</h1>
		</header>
		<content>
	</body>