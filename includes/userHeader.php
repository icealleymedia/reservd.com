<ul class="loggedinUser">
	<li>Welcome&nbsp;<? echo $user->data["firstname"] . '&nbsp;' . $user->data["lastname"]; ?>
		<ul class="usermenu">
			<li>Item 1</li>
			<li>Item 2</li>
			<li><a href="api/authenticate.php?requestType=logout" title="Logout of your account">Logout</a></li>
		</ul>
	</li>
</ul>