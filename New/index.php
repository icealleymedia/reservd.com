<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/header.php"); ?>
<form id="login" action="#" method="post" />
	<div>
		<span><i class="fas fa-user"></i><input type="text" name="loginId" placeholder="email or username"></span>
	</div>
	<div>
		<span><i class="fas fa-lock"></i><input type="password" name="loginKey" placeholder="Password"></span>
	</div>
</form>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/footer.php"); ?>