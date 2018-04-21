<?php require("../includes/header.php"); ?>
<?php
if(isset($_POST)){
	if(!empty($_POST['passwordVerify'])){
		$args = [
			'Password' => $_POST['passwordVerify'],
			'userType' => $_POST['userType'],
			'activateCode' => $_POST['activateCode']
		];

		$user = new User($DB_conn);
		$user->Verify($args);
	}
}
?>

<form id="activate" action="activate.php" method="post">
	<input type="hidden" name="activateCode" value="<?php echo $_GET['activateCode']; ?>">
	<input type="hidden" name="userType" value="<?php echo $_GET['User']; ?>">
	<input type="password" name="passwordVerify" placeholder="Password" required />
	<input type="submit" Value="Activate Account" />
</form>
<?php require("../includes/footer.php"); ?>