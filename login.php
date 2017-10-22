<? require("includes/header.php"); ?>
<form id="login" action="#" method="post">
	<div>
		<label>Username or Email</label>
		<input type="text" name="loginName" placeholder="Username or Email" required />
	</div>
	<div>
		<label>Password</label>
		<input type="password" name="loginKey" placeholder="Password" required />
		<button id="showText"><i class=""><span>ShowText</span></i></button>
	</div>
	<div>
		<input type="submit" value="Log Me In" />
	</div>
</form>
<? require("includes/footer.php"); ?>