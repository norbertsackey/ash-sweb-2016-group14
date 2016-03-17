	<html>
		<head>
			<title>Add New Equipment</title>
			<link rel="stylesheet" href="css/style.css">
			<script>
				<!--add validation js script here
			</script>
		</head>
		<body>

<?php
    include_once("Equipment.php");
	$obj = new Equipment();

	if(isset($_REQUEST['txtSearch']) && !isset($_REQUEST['groupby'])){
		$search_txt = $_REQUEST['txtSearch'];
	   if(!$obj->searchEquipment($search_txt)){
			echo "Error searching for Equipment";
	   }
	}
	else{
		$filter = "";
	    if(!$obj->getUsers($filter)){
			echo "Error getting Equipment";
	   }
	}


	  $row=$obj->fetch(); 
	  echo "<table border='1'>";
	  echo "<tr style='background-color:olive; text-align:center ;font-family:Georgia'><td>Name</td><td>Description</td><td>Category</td><td>Manufacturer</td><td>Lastname</td><td>Edit</td><td>Delete</td><td>Status</td></tr>";
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