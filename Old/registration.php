<? require_once("includes/header.php"); ?>
	<form id="register" action="api/authenticate.php" method="post">
		<input type="hidden" name="userType" Value="staff" />
		<input type="hidden" name="requestType" Value="register" />
	  	<div>
			<label>First Name</label>
			<input type="text" placeholder="Please enter your first name" name="firstname" required>
		</div>
		<div>
			<label>Last Name</label>
			<input type="text" placeholder="Please enter your last name" name="lastname" required>
		</div>	
		<div>
			<label>Email</label>
			<input type="email" placeholder="Please enter your email" name="email" required>
		</div>
		<div>
			<label>Password</label>
			<input id="password" type="password" placeholder="Please enter a secure password" name="password" required>
		</div>
		<div>
			<label>Re Enter Password</label>
			<input type="password" placeholder="Please repeat the password" name="passwordrepeat" required>
		</div>
		<div class="clearfix">
		  <button type="reset"  class="resetbutton">Reset</button>
		  <button type="submit" class="signupbutton">Sign Up</button>
		</div>
	</form>
<? require_once("includes/footer.php"); ?>