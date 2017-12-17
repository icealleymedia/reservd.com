<? require_once("includes/header.php");
// check user login if logged in get information if not redirect to login page.
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
?>
<a href="#" title="">Business Settings</a>
<a href="#" title="">Appointment Ledger</a>
<a href="#" title="">Staff Management</a>
<a href="#" title="">Customer Relations</a>
<a href="#" title="">Profile Management</a>
<a href="#" title="">Training Academy</a>
<?php require_once("includes/footer.php"); ?>