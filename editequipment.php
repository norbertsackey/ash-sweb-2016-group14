<!DOCTYPE html>
<html>
<html lang="en">
	<head>
		<title> Home </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>

<!-- B O D Y -->
<body>

	<!-- H E A D E R -->
	<div class="header">

		<!-- Logo-->
		<div id="logo">
			<img class="ashesi" src="images/ashesilogo.png" alt="ashesi">
		</div>

		<!-- Items in Menu bar -->
		<div class="menu-wrapper">
				<a class="menu-item" href="home.html"> HOME </a>

				<div class="dropdown">
				<a class="menu-item" href="#"> EQUIPMENT </a>
				
						<div class="dropdown-content">
							<a href="viewequipment.html"> View Equipment </a>
							<a href="addequipment.html"> Add Equipment </a>
							<a href="editequipment.html"> Edit Equipment </a>
							<a href="removeequipment.html"> Remove Equipment </a>
						</div>
				</div>

				<div class="dropdown">
				<a class="menu-item" href="#"> BOOKINGS </a>

						<div class="dropdown-content">
							<a href="viewbookings.html"> View Bookings </a>
							<a href="editbookings.html"> Edit Bookings </a>
							<a href="removebookings.html"> Remove Bookings </a>
						</div>
				</div>

				<div class="dropdown">
				<a class="menu-item" href="#"> BORROWERS </a>
						<div class="dropdown-content">
							<a href="borrowerslog.html"> Borrowers Log </a>
							<a href="editborrowers.html"> Edit Borrower </a>
							<a href="removeborrowers.html"> Remove Borrower </a>
						</div>
					</div>

				<div class="dropdown">
				<a class="menu-item" href="#"> SUPPLIERS </a>
						<div class="dropdown-content">
							<a href="viewsuppliers.html"> View Suppliers </a>
							<a href="addsuppliers.html"> Add Suppliers </a>
							<a href="editsuppliers.html"> Edit Suppliers </a>
							<a href="removesuppliers.html"> Remove Suppliers </a>
						</div>
					</div>

				<div class="dropdown">
				<a class="menu-item" href="#"> LABS </a>
						<div class="dropdown-content">
							<a href="viewlabs.html"> View Labs </a>
							<a href="addlabs.html"> Add Labs </a>
							<a href="editlabs.html"> Edit Labs </a>
							<a href="removelabs.html"> Remove Labs </a>
						</div>
					</div>
		</div>

		<!-- Username -->
		<div class="username">
			<div class="dropdown">
				<span class="username-text"> Username </span>
					<div class="dropdown-content">
							<a href="login.html"> Logout </a>
						</div>
				<img class="usericon" src="images/usericon.png" alt="usericon">
			</div>
		</div>

	</div>

	<!-- G R E Y  B A R -->
	<div class="greybar">
		<div class="search">
			<form>
				<input type="text" name="txtSearch">
				<input type="submit" value="Search">
			</form>
		</div>
	</div>

	<!-- C O N T E N T -->
	<div class="content">
	<?php

	// Include user edit page
	include_once("equipment.php");

	// Defining variables
	$equipId = null;
	$equipName = null;
	$equipDescription = null;
	$equipStatus = null;
	$equipCategory = null;
	$equipPrice = null;
	$equipManufacturer = null;
	$labId = null;
	$supplierId = null;

	// Check for equipment id, , firstname, lastname, permission and usergroup
	if (isset($_REQUEST['Equip_ID'])) {
		$equipId = $_REQUEST['Equip_ID'];
		echo $equipId;
	}

	if (isset($_REQUEST['Equip_Name'])) {
		$equipId = $_REQUEST['Equip_Name'];
		echo $equipId;
	}

	if (isset($_REQUEST['Equip_Description'])) {
		$equipDescription = $_REQUEST['Equip_Description'];
		echo $equipDescription;
	}

	if (isset($_REQUEST['Equip_Status'])) {
		$equipStatus = $_REQUEST['Equip_Status'];
		echo $equipStatus;
	}

	if (isset($_REQUEST['Equip_Category'])) {
		$equipCategory = $_REQUEST['Equip_Category'];
		echo $equipCategory;
	}

	if (isset($_REQUEST['Equip_Price'])) {
		$equipPrice = $_REQUEST['Equip_Price'];
		echo $equipPrice;
	}

	if (isset($_REQUEST['Equip_Manufacturer'])) {
		$equipManufacturer = $_REQUEST['Equip_Manufacturer'];
		echo $equipManufacturer;
	}

	if (isset($_REQUEST['Lab_ID'])) {
		$labid = $_REQUEST['Lab_ID'];
		echo $labid;
	}

	if (isset($_REQUEST['Supplier_ID'])) {
		$supplier_id = $_REQUEST['Supplier_ID'];
		echo $supplierId;
	}

	// Create an object of users
	$obj = new equipment();

	// If the usercode request has been set
	if ($equipId){
		$obj->getTools($equipId);
	}

	// If the submit request has been set
	if (isset($_REQUEST['submit'])) { 
		$obj->editTool($equipid, $equipname, $equipdescription, $equipstatus, $equipcategory, $equipprice, $equipmanufacturer, $labid, $supplierid);

		// Redirect the page to userlist.php 
		header('Location: equipment.php');	// CHECK THIS RE-DIRECTION
		exit;
	} 

	?>

		<form class="center-form" action="" method="POST">
			<div>Equipment ID: <input type="text" name="equipid" value="<?php echo $equipid ?>"> </div>
			<br>
			<div>Equipment Name: <input type="text" name="equipname" value="<?php echo $equipname ?>"> </div>
			<br>
			<div>Equipment Description: <input type="text" name="equipdescription" value="<?php echo $equipdescription?>"> </div>
			<br>
			<div>Equipment Status: <input type="text" name="equipstatus" value="<?php echo $equipstatus?>"> </div>
			<br>
			<div>Equipment Category: <input type="text" name="equipcategory" value="<?php echo $equipcategory?>"> </div>
			<br>
			<div>Equipment Price <input type="text" name="equipprice" value="<?php echo $equipprice?>"> </div>
			<br>
			<div>Equipment Manufacturer: <input type="text" name="equipmanufacturer" value="<?php echo $equipmanufacturer?>"> </div>
			<br>
			<div>Lab ID <input type="text" name="labid" value="<?php echo $labid?>"> </div>
			<br>
			<div>Supplier ID <input type="text" name="supplierid" value="<?php echo $supplierid?>"> </div>
			<input type="submit" name="submit" value="submit"> </input> 
		</form>

	</div>


	<!-- F O O T E R -->
	<div class="footer">
		<p class="text"> Designed and created by Kwame Odame. All Rights Reserved </p>

	</div>
	
</body>

</html>