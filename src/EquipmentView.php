	<html>
		<head>
			<title>Reserve Equipment</title>
			<link rel="stylesheet" href="css/style.css">
			<script>
				<!--add validation js script here
			</script>
		</head>
		<body>
		<table>
				<tr>
					<td colspan="2" id="pageheader">
						Application Header
					</td>
				</tr>
				<tr>
					<td id="mainnav">
						<div class="menuitem">menu 1</div>
						<div class="menuitem">menu 2</div>
					</td>
					<td id="content">
						<div id="divPageMenu">
							<span class="menuitem" >page menu 1</span>
							<input type="text" id="txtSearch" />
							<span class="menuitem">search</span>		
						</div>
						<div id="divStatus" class="status">
							status message
						</div>
						<div id="divContent">
							Content space
						<form action="" method="GET"> 
							<input type="text" name="txtSearch">
							<input type="submit" value="search" >
							</div>
							</form>
							
					

<?php
    include_once("Equipment.php");
	$obj = new Equipment();

	if(isset($_REQUEST['txtSearch'])){
		$search_txt = $_REQUEST['txtSearch'];
	   if(!$obj->searchTool($search_txt)){
			echo "Error searching for Equipment";
	   }
	}
	else{
	    if(!$obj->getTools()){
			echo "Error getting Equipment";
	   }
	}


	  

	$row=$obj->fetch();  	
	 	/* Display */
		echo "<table border='1'>";

			echo "<tr bgcolor='lightgrey'>";
				echo "<td> EQUIP_ID </td>";
				echo "<td> EQUIP_NAME </td>";
				echo "<td> EQUIP_DESCRIPTION </td>";
				echo "<td> EQUIP_STATUS </td>";
				echo "<td> EQUIP_CATEGORY </td>";
				echo "<td> LAB_ID </td>";
				echo "<td> RESERVE </td>";

			echo "</tr>";

		while ($row) {
			$cmd="";
   		    $status = $row['Equip_Status'];
	       if($status=="Available"){
	 		$cmd = 'Reserve';
	        }
	   else if($status=="Reserved"){
	 		$cmd = 'Unavailable';

	   }
	else{
	 		$cmd = 'Unknown';

	   }

		echo "<tr>
				<td> {$row['Equip_ID']} </td>
				<td> {$row['Equip_Name']} </td>
				<td> {$row['Equip_Description']} </td>
				<td> {$row['Equip_Status']} </td>
				<td> {$row['Equip_Category']} </td>
				<td> {$row['Lab_Id']} </td>";
				echo "<td><a href=bookingcontroller.php?Equip_ID="."{$row['Equip_ID']}"."&cmd={$cmd}".">".$cmd."<a></td>";
			    echo "</tr>";
				$row=$obj->fetch(); 
	}
		echo "</table>";
?>	
						</div>
					</td>
				</tr>
			</table>
		</body>
	</html>