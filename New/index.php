<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/header.php"); ?>
<?php
	if(isset($_SESSION['id']) || isset($_COOKIE['idx'])){
		header("location: dashboard.php");
	}
?>
<form id="login" action="#" method="post" />
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