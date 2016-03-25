	<html>
		<head>
			<title>Bookings</title>
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
    include_once("Booking.php");
	$obj = new Booking();

	if(isset($_REQUEST['txtSearch'])){
		$search_txt = $_REQUEST['txtSearch'];
	   if(!$obj->searchBookings(14771020)){
			echo "Error searching for Equipment";
	   }
	}
	else{
	    if(!$obj->getBookings()){
			echo "Error getting Equipment";
	   }
	}


	  $row=$obj->fetch(); 
	  echo "<table border='1'>";
	  echo "<tr style='background-color:olive; text-align:center ;font-family:Georgia'><td>UserID</td><td>EquipID</td><td>TimeBooked</td><td>Unbook</td></tr>";
	  $style="";
	   $i=0;
	 while($row){
        
	 	if($i%2==0){
				$style="style='background-color:Khaki;font-family:Georgia'";
			}else{
				$style="style='font-family:Georgia'";
			}
			
			echo "<tr $style >";
			echo "<td>{$row["User_Id"]}</td>";
			echo "<td>{$row["Equip_Id"]}</td>";
			echo "<td>{$row["time_Booked"]}</td>";
			echo "<td><a href=bookingcontroller.php?Eid="."{$row['Equip_Id']}"."&cmd=Unbook".">Unbook<a></td>";
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