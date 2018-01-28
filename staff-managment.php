<? require_once("includes/header.php"); ?>
<h2>Staff Management</h2>
<!-- add new staff member -->
<button id="add-staff">Add New</button>
<!-- staff list and online status with editing capabilities -->
<div id="activestaffList">
	<h3>Active Staff Members</h3>
</div>
<!-- display past staff members and information -->
<div id="staffProfile">
</div>
<div id="staffHistory">
	<h3>Inactive Staff Members</h3>
</div>
<!-- hidden add staff form that will populate in shadow box when add staff button clicked -->
<!-- search field -->
<form id="employSearch">
   <div class="lookup">
   <h4>Find an employee profile</h4>
      <input type="text" class="searchValue" placeholder="Lookup by phone or email!">
      <button type="submit" class="searchButton">Search</button>
   </form>
</div>
<form id="addstaff">
</form>
<? require_once("includes/footer.php"); ?>