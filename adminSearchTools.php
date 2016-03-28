<html>
	<head>
		<title>Search tools</title>
		<link rel="stylesheet" href="style.css">
		
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					LAB INVENTORY
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
								
					</div>
			
					<div id="divContent">
						Search tool
					<form action="" method="GET">
						<input type="text" name="txtSearch">
						
						<input type="submit" value="search" >		
					</form>	

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

		echo "<tr>
				<td> {$row['Equip_ID']} </td>
				<td> {$row['Equip_Name']} </td>
				<td> {$row['Equip_Description']} </td>
				<td> {$row['Equip_Status']} </td>
				<td> {$row['Equip_Category']} </td>
				<td> {$row['Equip_Price']} </td>
				<td> {$row['Equip_Manufacturer']} </td>
				<td> {$row['Lab_Id']} </td>
				<td> {$row['Supplier_Id']} </td>";
		echo "</tr>";
	}
		echo "</table>";
?>						
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	
