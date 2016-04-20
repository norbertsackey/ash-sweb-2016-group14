<!DOCTYPE html>
<html>
<html lang="en">
	<head>
		<title> Home </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>

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
							<a href="viewequipment.php"> View Equipment </a>
							<a href="addequipment.html"> Add Equipment </a>
							<a href="editequipment.php"> Edit Equipment </a>
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
		<div id ="topdiv">
		</div>

		<div id="middlediv">

			<script type="text/javascript">

				/**
				* callback function for  method	
				*/
				function saveCellComplete(xhr,status){
					if(status!="success"){
						divStatus.innerHTML="error sending request";
						return;
					}
					
					var obj=$.parseJSON(xhr.responseText);
					if(obj.result==0){
						divStatus.innerHTML=obj.message;	
					}
					else{
						
						divStatus.innerHTML="status changed";

						// print table row with new name
							
					}
					
					currentObject=null;
				}

				function saveCell(usercode){
					var newName=document.getElementById('txtName').value;
					var ajaxPageUrl = "usersajax.php?cmd=5&txtName="+newName+"&uc="+usercode;
					$.ajax(ajaxPageUrl,
							{
								async: true,
								complete: saveNameComplete,
							}
						);
				}

				currentObject = null;



				function editCell(obj,id){
					var currentName=obj.innerHTML;
					obj.innerHTML="<input id='txtName' type='text' > <span class='clickspot' onclick='saveName("+id+")' >save</span>";
					$("#txtName").val(currentName);	
			}

			</script>

			<?php

				/* Creates an object of the equipment class */
				include_once("equipment.php");
				$obj = new equipment();
				$filter = false;

				/* Search Equipments by text */
				if (isset($_REQUEST['txtSearch'])) {
					$filter = $_REQUEST['txtSearch'];
					$row = $obj->searchTool($filter);
				}

				/* Display all tools */
				else {
					$row = $obj->searchTool($filter);
				}

				if (!$row) {
					echo "Error searching tools";
				}
				
				/* Display */
					echo "<table border='1'>";

						echo "<tr bgcolor='lightgrey'>";
							echo "<td> EQUIP_ID </td>";
							echo "<td> EQUIP_NAME </td>";
							echo "<td> EQUIP_DESCRIPTION </td>";
							echo "<td> EQUIP_STATUS </td>";
							echo "<td> EQUIP_CATEGORY </td>";
							echo "<td> EQUIP_PRICE </td>";
							echo "<td> EQUIP_MANUFACTURER </td>";
							echo "<td> LAB_ID </td>";
							echo "<td> SUPPLIER_ID </td>";
						echo "</tr>";

					while ($row = $obj->fetch()) {

					echo "<tr>";
						echo 	"<td> {$row['Equip_ID']} </td>";
						echo	"<td> {$row['Equip_Name']} </td>";
						echo	"<td> {$row['Equip_Description']} </td>";
						echo	"<td> {$row['Equip_Status']} </td>";
						echo    "<td> {$row['Equip_Category']} </td>";
						echo	"<td> {$row['Equip_Price']} </td>";
						echo	"<td> {$row['Equip_Manufacturer']} </td>";
						echo	"<td> {$row['Lab_ID']} </td>";
						echo	"<td> {$row['Supplier_ID']} </td>";

					echo "</tr>";
				}
					echo "</table>";
			?>

		</div>

		<div id="bottomdiv">

		</div>

	</div>


	<!-- F O O T E R -->
	<div class="footer">
		<p class="text"> Designed and created by Kwame Odame. All Rights Reserved </p>
	</div>
	
</body>

</html>