	<html>
		<head>
			<title>Bookings</title>
			<link rel="stylesheet" href="css/style.css">
			<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
			<script type="text/javascript" src="jquery-2.1.3.js"></script>
			<script>

    function sendRequest(u){
           
                var obj=$.ajax({url:u,async:false});
              
                var result=$.parseJSON(obj.responseText);
                return result;
                
            }    



    function liveSearch(str) {

      var obj = sendRequest("Bookingcontroller.php?cmd=2&txtSearch="+str);
        if(obj.result == 1){
            displayTasks(obj);
        }else if(obj.result == 0){
            $('#divStatus').text(obj.result);
        }
    }


     function displayTasks(obj){
     	
        var i = 0;
        var style="";
	  
      var table ='<div id="btable">';
	  table +="<table border='1' >";
	  table +="<tr style='background-color:olive; text-align:center ;font-family:Georgia'><td>Booking ID</td><td>UserID</td><td>EquipID</td><td>EquipName</td><td>Category</td><td>TimeBooked</td><td>Unbook</td></tr>";
        for(; i < obj.bookings.length; i++){
        	if(i%2==0){
				style+="style='background-color:Khaki;font-family:Georgia'";
			}else{
				style+="style='font-family:Georgia'";
			}
            
			table += "<tr"+ style +">";
		    table += "<td>"+ obj.bookings[i].Booking_Id +"</td>";
            table += "<td>"+ obj.bookings[i].User_Id +"</td>";
            table += "<td>"+ obj.bookings[i].Equip_Id +"</td>";
            table += "<td>"+ obj.bookings[i].Equip_Name +"</td>";
            table += "<td>"+ obj.bookings[i].Equip_Category +"</td>";
            table += "<td>"+ obj.bookings[i].Time_Booked +"</td>";
            table += "<td><a href=Bookingcontroller.php?Equip_Id="+obj.Equip_Id+"&cmd=Unreserve &Booking_Id="+obj.Booking_Id+">Unreserve<a></td>";
            table +="</tr>";
            
        } 
        table += "</table";          
        table += "</div";       
        $('#btable').html(table);
        $('#btable').show();
       
    }
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
							<input type="text" name="txtSearch" onkeyup="liveSearch(this.value)">
							<input type="submit" value="search" >
							</div>
							</form>
							
					

<?php
    include_once("Booking.php");
	$obj = new Booking();

	
  if(isset($_REQUEST['txtSearch'])){
    $search_txt = $_REQUEST['txtSearch'];
     if(!$obj->searchBookings($search_txt)){
      echo "Error searching for Equipment";
     }
  }
  else{
      if(!$obj->getBookings()){
      echo "Error getting Equipment";
     }
  }
/*
	 if(!$obj->getBookings()){
			echo "Error getting Equipment";
	  }
	*/


	  $row=$obj->fetch(); 

	  echo "<div id = btable >";
	  echo "<table border='1' >";
	  echo "<tr style='background-color:olive; text-align:center ;font-family:Georgia'><td>Booking ID</td><td>UserID</td><td>EquipID</td><td>EquipName</td><td>Category</td><td>TimeBooked</td><td>Unbook</td></tr>";
	  $style="";
	   $i=0;
	 while($row){
        
	 	if($i%2==0){
				$style="style='background-color:Khaki;font-family:Georgia'";
			}else{
				$style="style='font-family:Georgia'";
			}
			
			echo "<tr $style >";
			echo "<td>{$row["Booking_Id"]}</td>";
			echo "<td>{$row["User_Id"]}</td>";
			echo "<td>{$row["Equip_Id"]}</td>";
			echo "<td>{$row["Equip_Name"]}</td>";
			echo "<td>{$row["Equip_Category"]}</td>";
			echo "<td>{$row["Time_Booked"]}</td>";
			echo "<td><a href=Bookingcontroller.php?Equip_Id="."{$row['Equip_Id']}"."&cmd=Unreserve&Booking_Id={$row['Booking_Id']}".">Unreserve<a></td>";
			echo "</tr>";
			$row= $obj->fetch();
			$i++;
		


	 } 	
	?>						
	                      </div>
						</div>
					</td>
				</tr>
			</table>
		</body>
	</html>