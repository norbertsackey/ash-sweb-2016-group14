<<<<<<< HEAD
	<html>
		<head>
			<title>Add New User</title>
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
						    <div>User Group: 
					<select name="usergroup">
	<?php
		//a call to the class
		include_once("usergroups.php");
		$usergroup = new usergroups();
		$result=$usergroup->getAllUserGroups();
		//echo $strQuery;
		if($result==false){
			//
			echo "result is false";
		}else{
			while($row=$usergroup->fetch()){
				echo "<option value='{$row['ugid']}'>{$row['ugname']}</option>";
			}
		}
		
	?>			
 				</select>
 				 Group Filter <input type="checkbox" value="1" name="groupby">
 				</div>
				</form>		

	


<?php
	include_once("users.php");
	$obj = new users();

	if(isset($_REQUEST['txtSearch']) && !isset($_REQUEST['groupby'])){
		$search_txt = $_REQUEST['txtSearch'];
	   if(!$obj->searchUsers($search_txt)){
			echo "Error searching for users";
	   }
	}
	else if(isset($_REQUEST['txtSearch'])  &&  ($_REQUEST['groupby']==1)) {
		$search_txt = $_REQUEST['txtSearch'];
		$groupID = $_REQUEST['usergroup'];
	   if(!$obj->searchUsersByGroup($search_txt,$groupID)){
			echo "Error searching for users ";
	   }
	}
	else{
		$filter = "";
	    if(!$obj->getUsers($filter)){
			echo "Error getting users";
	   }
	}


	  $row=$obj->fetch(); 
	  echo "<table border='1'>";
	  echo "<tr style='background-color:olive; text-align:center ;font-family:Georgia'><td>Usercode</td><td>Username</td><td>Firstname</td><td>Lastname</td><td>Edit</td><td>Delete</td><td>Status</td></tr>";
	  $style="";
	   $i=0;
	 while($row){

	 	$status = $row['status'];
	 	if($status<=1){
	 		$cmd2 = 'Enable';
	   }
	 	else if($status==2){
	 		$cmd2 = 'Disable';
	 	}

	 	if($i%2==0){
				$style="style='background-color:Khaki;font-family:Georgia'";
			}else{
				$style="style='font-family:Georgia'";
			}
			
			echo "<tr $style >";
			echo "<td>{$row["Usercode"]}</td>";
			echo "<td>{$row["Username"]}</td>";
			echo "<td>{$row["Firstname"]}</td>";
			echo "<td>{$row["Lastname"]}</td>";
			echo "<td><a href=usersedit.php?uid="."{$row['Usercode']}"."&cmd=edit".">Edit<a></td>";
			echo "<td><a href=usersdelete.php?uid="."{$row['Usercode']}"."&cmd=del".">Delete<a></td>";
			echo "<td><a href=usersdelete.php?uid="."{$row['Usercode']}"."&cmd={$cmd2}".">".$cmd2."<a></td>";
			echo "</tr>";
			$row= $obj->fetch();
			$i++;
		


	 } 	
	?>						
						</div>
					</td>
				</tr>
			</table>
		</body>
	</html>
=======
<html>
	<head>
		<title>Add New User</title>
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
						<!-- Form to filter list by group -->
						<select name="usergroup">
							<option value=""> Filter by usergroup </option>
							<option value="1"> Admin </option>
							<option value="2"> Student </option>
							<option value="3"> Faculty </option>
						</select>
						<input type="submit" value="search" >		
					</form>	

<?php

	//1) Create object of users class
	include_once("users.php");
	$obj = new users();
	$filter = false;

	// Search Users by text
	if (isset($_REQUEST['txtSearch'])) {
		$filter = $_REQUEST['txtSearch'];

		$row = $obj->searchUsers($filter);
	}

	// Filter by usergroup
	if (isset($_REQUEST['usergroup']) && $_REQUEST['usergroup']!= "") {
		$filter = $_REQUEST['usergroup'];

		$row = $obj->filterbyUsergroup($filter);
	}

	// Display all users
	else {
		$row = $obj->searchUsers($filter);
	}

	if (!$row) {
		echo "Error searching users";
	}
	
	// Display
		echo "<table border='1'>";

			echo "<tr bgcolor='lightgrey'>";
				echo "<td> USERCODE </td>";
				echo "<td> USERNAME </td>";
				echo "<td> FIRSTNAME </td>";
				echo "<td> LASTNAME </td>";
				echo "<td> USERGROUP </td>";
				echo "<td> PERMISSION </td>";
				echo "<td> STATUS </td>";
				echo "<td> </td>";
				echo "<td> </td>";
				echo "<td> </td>";
			echo "</tr>";

		while ($row = $obj->fetch()) {

		echo "<tr>
				<td> {$row['USERCODE']} </td>
				<td> {$row['USERNAME']} </td>
				<td> {$row['FIRSTNAME']} </td>
				<td> {$row['LASTNAME']} </td>
				<td> {$row['USERGROUP']} </td>
				<td> {$row['PERMISSION']} </td>
				<td> {$row['STATUS']} </td>
				<td> <a href='usersdelete.php?usercode={$row['USERCODE']}'> delete </a> </td>";
				if($row['STATUS'] == 'ENABLED') {
					echo "<td> <a href='usersdelete.php?usercode={$row['USERCODE']}&STATUS={$row['STATUS']}'> disable </a> </td>";
				}
				else {
					echo "<td> <a href='usersdelete.php?usercode={$row['USERCODE']}&STATUS={$row['STATUS']}'> enable </a> </td>";
				}
		echo "<td> <a href='usersedit.php?usercode={$row['USERCODE']}&username={$row['USERNAME']}&firstname={$row['FIRSTNAME']}&lastname={$row['LASTNAME']}&permission={$row['PERMISSION']}&usergroup={$row['USERGROUP']}' </a> edit </td>";
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
>>>>>>> dbf4b6e8444615a733201508bd562bbff3701897
