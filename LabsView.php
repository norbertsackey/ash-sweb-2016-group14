	<html>
		<head>
			<title>Labs</title>
			<link rel="stylesheet" href="css/style.css">
			<script type="text/javascript" src="mat/jquery-2.1.3.js"></script>
			<script>

    function sendRequest(u){
           
                var obj=$.ajax({url:u,async:false});
              
                var result=$.parseJSON(obj.responseText);
                return result;
                
            }    



    function liveSearch(str) {

      var obj = sendRequest("labsAjax.php?cmd=2&txtSearch="+str);
        if(obj.result == 1){
            displayTasks(obj);
        }else if(obj.result == 0){
            $('#divStatus').text(obj.result);
        }
    }


     function displayTasks(obj){
     	
        var i = 0;
        var style="";
	  
      var table ="<div id= 'btable'>";
	  table +="<table border='1' >";
	  table +="<tr style='background-color:olive; text-align:center ;font-family:Georgia'><td>Booking ID</td><td>UserID</td><td>EquipID</td><td>EquipName</td><td>Category</td><td>TimeBooked</td><td>Unbook</td></tr>";
        for(; i < obj.Labs.length; i++){
        	if(i%2==0){
				style+="style='background-color:Khaki;font-family:Georgia'";
			}else{
				style+="style='font-family:Georgia'";
			}
            
			table += "<tr"+ style +">";
		    table += "<td>"+ obj.Labs[i].lab_id +"<td>";
            table += "<td>"+ obj.Labs[i].User_Id +"<td>";
            table += "<td>"+ obj.Labs[i].Equip_Id +"<td>";
            table += "<td>"+ obj.Labs[i].Equip_Name +"<td>";
            table += "<td><a href=labsAjax.php?Equip_Id="+obj.Lab_id+"&cmd=search &lab_id="+obj.lab_id+">View<a><td>";
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
		<div>
						<form action="" method="GET"> 
							<input type="text" name="txtSearch" onkeyup="liveSearch(this.value)">
							<input type="submit" value="search" >
							</form>
			</div>				
					

<?php
    include_once("Labs.php");
	$obj = new Labs();

	 if(!$obj->getLabs()){
			echo "Error getting lab";
	  }
	


	  $row=$obj->fetch(); 

	  echo "<div id = 'table' >";
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
			echo "<td>{$row["lab_id"]}</td>";
			echo "<td>{$row["User_Id"]}</td>";
			echo "<td>{$row["Equip_Id"]}</td>";
			echo "<td>{$row["Equip_Name"]}</td>";
			echo "<td><a href=LabsAjax.php?lab_id="."{$row['lab_id']}"."&cmd=1&lab_id={$row['lab_id']}".">search<a></td>";
			echo "</tr>";
			$row= $obj->fetch();
			$i++;
		


	 } 	
	?>						
	           </div>
			</table>
		</body>
	</html>