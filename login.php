<? require_once("includes/header.php"); ?>
<form id="login" action="api/authenticate.php" method="post">
	<input type="hidden" name="loginLevel" Value="staff" />
	<div>
		<label>Username or Email</label>
		<span><i class="fa fa-user fa-lg"></i><input type="text" name="loginName" placeholder="Username or Email" required /></span>
	</div>
	<div>
		<label>Password</label>
		<span><i class="fa fa-lock fa-lg"></i><input type="password" name="loginKey" placeholder="Password" required /></span>
		<button id="showText"><i class="fa fa-eye" aria-hidden="true" title="show password in normal text to confirm accuracy"></i><span>ShowText</span></button>
	</div>
	<div>
		<span>
			<input type="checkbox" name="remember" />
			<label for="remember">Remember Me</label>
		</span>
		<span>
			<a href="forgot.php" title="forgot your login information click here to gain access">Forgot Password?</a>
		</span>
	</div>
	<div>
		<input type="submit" value="Log Me In" />
	</div>
</form>
<div class="loader">
	<i class="fa fa-spinner fa-pulse fa-5x" aria-hidden="true"></i>
	<span class="sr-only">Loading....</span>
</div>
<? require_once("includes/footer.php"); ?>