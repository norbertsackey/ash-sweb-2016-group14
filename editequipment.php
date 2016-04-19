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

	if (isset($_REQUEST['username'])) {
		$username = $_REQUEST['username'];
		echo $username;
	}

	if (isset($_REQUEST['firstname'])) {
		$firstname = $_REQUEST['firstname'];
		echo $firstname;
	}

	if (isset($_REQUEST['lastname'])) {
		$lastname = $_REQUEST['lastname'];
		echo $lastname;
	}

	if (isset($_REQUEST['password'])) {
		$password = $_REQUEST['password'];
		echo $password;
	}

	if (isset($_REQUEST['permission'])) {
		$permission = $_REQUEST['permission'];
		echo $permission;
	}

	if (isset($_REQUEST['usergroup'])) {
		$usergroup = $_REQUEST['usergroup'];
		echo $usergroup;
	}

	// Create an object of users
	$obj = new users();

	// If the usercode request has been set
	if ($usercode){
		$obj->getUserInfo($usercode);
	}

	?>

		<form class="center-form">
			<div>Equipment ID: <input type="text" name="username"> </div>
			<br>
			<div>Equipment Name: <input type="text" name="firstname"> </div>
			<br>
			<div>Equipment Description: <input type="text" name="pword" ></div>
			<br>
			<div>Equipment Status: <input type="text" name="firstname"> </div>
			<br>
			<div>Equipment Category: <input type="text" name="firstname"> </div>
			<br>
			<div>Equipment Price <input type="text" name="firstname"> </div>
			<br>
			<div>Equipment Manufacturer: <input type="text" name="firstname"> </div>
			<br>
			<div>Lab ID <input type="text" name="firstname"> </div>
			<br>
			<div>Supplier ID <input type="text" name="firstname"> </div>
		</form>

	</div>


	<!-- F O O T E R -->
	<div class="footer">
		<p class="text"> Designed and created by Kwame Odame. All Rights Reserved </p>

	</div>
	
</body>

</html>