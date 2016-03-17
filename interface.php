<html>
	<head>
		<title>Add New UserGroup</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			//add validation js script here
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
					</form>	


<?php

	//1) Create object of usergroup class
	include_once("usergroups.php");
	$obj = new usergroups();
	$filter = false;
	$get = $obj->getAllUserGroups($filter);

	//2) Call the object's getAllUserGroups method and check for error
	if (!$get) {
		echo "Error getting usergroups";
	}



					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	


