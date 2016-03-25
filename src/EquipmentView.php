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
	   if(!$obj->searchEquipment($search_txt)){
			echo "Error searching for Equipment";
	   }
	}
	else{
	    if(!$obj->getEquipment()){
			echo "Error getting Equipment";
	   }
	}


	  $row=$obj->fetch(); 
	  echo "<table border='1'>";
	  echo "<tr style='background-color:olive; text-align:center ;font-family:Georgia'><td>Name</td><td>Description</td><td>Category</td><td>Manufacturer</td><td>Status</td></tr>";
	  $style="";
	   $i=0;
	 while($row){
        
        $cmd2="";
	 	$status1 = $row['availQuantity'];
	 	$status2 = $row['totalQuantity'];
	 	if($status2>$status1){
	 		$cmd2 = 'Reserve';
	   }
	 	else if($status2==$status1){
	 		$cmd2 = 'Unreserve';
	 	}

	 	if($i%2==0){
				$style="style='background-color:Khaki;font-family:Georgia'";
			}else{
				$style="style='font-family:Georgia'";
			}
			
			echo "<tr $style >";
			echo "<td>{$row["name"]}</td>";
			echo "<td>{$row["descrip"]}</td>";
			echo "<td>{$row["category"]}</td>";
			echo "<td>{$row["manufacturer"]}</td>";
			echo "<td><a href=bookingcontroller.php?Eid="."{$row['EquipID']}"."&cmd={$cmd2}".">".$cmd2."<a></td>";
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