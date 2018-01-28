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
<a href="settings.php" title=""><i class="fa fa-sliders"></i>Business Settings</a>
<a href="app-ledger.php" title=""><i class="fa fa-calendar"></i>Appointment Ledger</a>
<a href="staff-managment.php" title="Manage your staff"<i class="fa fa-users"></i>Staff Management</a>
<a href="customer-relations.php" title=""><i class="fa fa-comments"></i>Customer Relations</a>
<a href="profile.php" title=""><i class="fa fa-pencil-square"></i>Profile Management</a>
<a href="training-academy.php" title=""><i class="fa fa-graduation-cap"></i>Training Academy</a>
<a href="support.php" title=""><i class="fa fa-ticket"></i>Support Hub</a>
<?php require_once("includes/footer.php"); ?>