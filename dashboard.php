<?
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
 require_once("includes/header.php"); ?>
<a href="#" title="">Business Settings</a>
<a href="#" title="">Appointment Ledger</a>
<a href="#" title="">Staff Management</a>
<a href="#" title="">Customer Relations</a>
<a href="#" title="">Profile Management</a>
<a href="#" title="">Training Academy</a>
<?php require_once("includes/footer.php"); ?>