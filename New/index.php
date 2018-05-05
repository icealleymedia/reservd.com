<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/header.php"); ?>
<?php
	if(isset($_SESSION['id']) || isset($_COOKIE['idx'])){
		header("location: dashboard.php");
	}
	if(isset($_POST["submit"]){
		// validate inputs 
		
		// if inputs are valid continue
		// check if remember is set
		if(isset($_POST["remember"]){
			// call user login with remember set to true
		}
		// call user login with remember set to false
	}
?>
<form id="login" action="index.php" method="post" />
	<div>
		<span><i class="fas fa-user"></i><input type="text" name="loginId" placeholder="email or username"></span>
	</div>
	<div>
		<span><i class="fas fa-lock"></i><input type="password" name="loginKey" placeholder="Password"></span>
	</div>
	<div>
		<!-- add remember me check box and forgot password link here -->
	</div>
	<div>
		<input type="submit" id="login" value="Sign On" />
	</div>
</form>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/footer.php"); ?>