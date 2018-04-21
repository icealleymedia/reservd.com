<? require_once("includes/header.php"); ?>
<h2>Staff Management</h2>
<!-- staff list and online status with editing capabilities -->
<div id="activestaffList">
	<h3>Active Staff Members</h3>
</div>
<!-- display past staff members and information -->
	<div id="staffProfile"> <!-- this div hidden until staff member selected then it is populated and becomes visible -->
	</div>
	<div id="staffHistory">
		<h3>Inactive Staff Members</h3>
	</div>
	<!-- search field -->
<h3>Find your team</h3>
<form id="signup" method="POST">
	<div class="lookup">
	<h4>Find a profile</h4>
   		<input type="text" class="searchValue" placeholder="Lookup by phone or email!">
	  	<button type="submit" class="searchButton">Search</button>

	  	<button id="add-staff">Create employee record</button> <!-- this button will be hidden until search returns no results --> 
	</div>

</form> <!-- this form hidden until create employee record is clicked then becomes visible --> 
<!-- add new staff member -->
<!-- hidden add staff form that will populate in shadow box create employee record clicked -->
		<form id="addemploy">
	<div id="profilesetup">
		<input type="radio" name="employeetype" value="full-time">Full-Time<br>
		<input type="radio" name="employeetype" value="part-time">Part-Time<br>
	</div>
	<div id="employfirstname">
		<label>First Name</label>
		<input type="text" placeholder="Type their first name" name="firstname" required>
	</div>
	<div id="emplylastname">
		<label>Last Name</label>
		<input type="text" placeholder="Type their last name" name="lastname" required>
	</div>
	<!-- Auto populate as they type (similar to other services
	<div class="employaddress>
		<label>Address</label>
		<input type="????" placeholder="Start typing with street number" name="address" required>
	</div>
	-->
	<div id="employdob">
		<label>Date of Birth</label>
		<input id="date" type="date" placeholder="Enter their date of birth" required>
	</div>
	<div id="employemail">
		<label>Email</label>
		<input type="email" placeholder="Type their email address" name="employeeemail" required>
	</div>
	<div id="employaddress">
		<label>Phone</label>
		<input type="phone" placeholder="Enter their phone number" name="employeephone" required>
	</div>
	<div id="employtitle">
		<label>Job Title</label>
		<input type="text" placeholder="Enter their title" name="employeetitle" required>
	</div>
	<div id="newprofile">
	  <button type="submit" class="saveprofile">Save Profile</button>
	  <button type="reset" class="cleardata">Clear</button>
	</div>
</form>
<? require_once("includes/footer.php"); ?>