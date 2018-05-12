<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/header.php"); ?>
<?php
	if(isset($_SESSION['id']) || isset($_COOKIE['idx'])){
		header("location: dashboard.php");
	}
	if(isset($_POST["submit"])){
		$user = new User();
		// validate inputs 
		$v = New Valitron\Validator($_POST);
		$v->rule('required', ['loginId', 'loginKey']);

		if($v->validate()){
			// if inputs are valid continue
			// check if remember is set
			if(isset($_POST["remember"])){
				// call user login with remember set to true
			$user->login($_POST["loginId"], $_POST["loginKey"], true);
			}
			// call user login with remember set to false
			$user->login($_POST["loginId"], $_POST["loginKey"], false);
		}
	}
?>
<form id="login" action="index.php" method="post" />
	<h2>Login to Spotter</h2>
	<div>
		<label for="loginId">Email or Username</label>
		<span><i class="far fa-user"></i><input type="text" name="loginId" id="loginId"></span>
	</div>
	<div>
		<label for="loginKey">Password</label>
		<span><i class="fas fa-shield-alt"></i><input type="password" name="loginKey"></span>
	</div>
	<div>
		<!-- add remember me check box and forgot password link here -->
		<span>
			<input type="checkbox" name="remember" id="remember" value="true" >
			<label for="remember">Remember Me</label>
		</span>
		<span>
			<a href="forgot.php">Forgot Account?</a>
		</span>
	</div>
	<div>
		<input type="submit" id="login" value="Sign On" />
	</div>
</form>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/footer.php"); ?>