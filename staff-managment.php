<? require_once("includes/header.php"); ?>
<h2>Staff Management</h2>
<!-- hidden add staff form that will populate in shadow box when add staff button clicked -->
<!-- search field -->
<form id="employSearch">
	<div class="lookup">
	<h4>Find a profile</h4>
   		<input type="text" class="searchValue" placeholder="Lookup by phone or email!">
	  	<button type="submit" class="searchButton">Search</button>
   </div>
</form>
<!-- add new staff member -->
		<button id="add-staff">Add New</button>
<!-- staff list and online status with editing capabilities -->
	<div id="activestaffList">
	</div>
		<form id="addstaff">
	<div class="profilesetup">
		<input type="radio" name="stafftype" value="full-time">Full-Time<br>
		<input type="radio" name="stafftype" value="part-time">Part-Time<br>
	</div>
	<div>
		<label>First Name</label>
		<input type="text" placeholder="Type their first name" name="firstname" required>
	</div>
	<div>
		<label>Last Name</label>
		<input type="text" placeholder="Type their last name" name="lastname" required>
	</div>
	<!-- Auto populate as they type (similar to other services
	<div>
		<label>Address</label>
		<input type="????" placeholder="Start typing with street number" name="address" required>
	</div>
	-->
	<div>
		<label>Date of Birth</label>
		<input id="date" type="date" placeholder="Enter their date of birth" required>
	</div>
	<div>
		<label>Email</label>
		<input type="email" placeholder="Type their email address" name="employeeemail" required>
	</div>
	<div>
		<label>Phone</label>
		<input type="phone" placeholder="Enter their phone number" name="employeephone" required>
	</div>
	<div>
		<label>Position</label>
		<input type="text" placeholder="Enter their title" name="employeetitle" required>
	</div>
	<div class="newprofile">
	  <button type="submit"  class="saveprofile">Save Profile</button>
	  <button type="reset" class="cleardata">Clear</button>
	</div>
</form>
		<h3>Active Staff Members</h3>
	</div>
<!-- display past staff members and information -->
	<div id="staffProfile">
	</div>
	<div id="staffHistory">
		<h3>Inactive Staff Members</h3>
	</div>
<? require_once("includes/footer.php"); ?>