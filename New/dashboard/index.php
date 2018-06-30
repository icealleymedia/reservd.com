<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/header.php"); ?>
<ul id="dashboardNav">
	<li><a href="<? echo $homePath; ?>/dashboard/settings" title="">Business Settings</a></li>
	<li><a href="<? echo $homePath; ?>/ledger" title="View and manage appointments for your establishment">Appointment Ledger</a></li>
	<li><a href="<? echo $homePath; ?>/dashboard/management" title=""><i></i>Staff Management</a>
		<ul>
			<li><a href="" title="">Add Staff</a></li>
		</ul>
	</li>
	<li><a href="<? echo $homePath; ?>/dashboard/cr" title="">Customer Relations</a></li>
	<li><a href="<? echo $homePath; ?>/dashboard/profile" title="">Profile Managment</a></li>
	<li><a href="<? echo $homePath; ?>/dashboard/academy" title="">Training Academy</a></li>
	<li><a href="<? echo $homePath; ?>/dashboard/support" title="">Support Hub</a></li>
</ul>
<div class="dashWidget">
	<h3>Your Messages</h3>
</div>
<div class="dashWidget">
	<h3>Spotter News</h3>
</div>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/New/includes/footer.php"); ?>