<html>
<head>
<title>Index</title>

<link rel="stylesheet" href="css/s.css" >
 
</head>

<!-- <div class = "center">
<div class = "rh">
<a  href="#"><b>Login</b></a>

</div> -->
<body>
<head>
<img style="position:left; top: -1%; left:22%; margin: 25px -25px -25px 25px;" src="Ashesi.jpg" width="100" />

<!-- <p style = "text-align:center; font-size: 30px"><b>Ashesi University College<b></p> -->
<p style = "text-align:center ; font-size: 25px"><b>Lab Management System<b></p>
<nav>

<ul>
<li><a href="home.php">Home</a></li>
<li><a href="laboratories.php">Laboratories</a></li>
<li><a href="manufacturers.php">Equipment</a></li>
<li><a href="students.php">Suppliers</a></li>
</ul>

</nav>
</head>
</div>

<div class = "center1" style="text-align:center" >
<br><ul class = 'm'>
<li><a href = 'addlab.php'>Labs Home Page </a></li>
<li><a href = 'lab_view.php'>View Labs</a></li><br>
</div>
<div class= "center2">


<p style = "font-size: 25px">Add Lab</p>
<table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee" style="text-align:center">
<th colspan="2" align="center">Lab Information</th>


<form action ="addlab.php" method = "GET" style="text-align:center">
<tr><td>Lab Id</td>
<td><input type ="text" name ="lid"></td></tr>
<tr><td>Lab Name</td>
<td> <input type = "text" name = "ln"></td></tr>
<tr><td>Lab Type</td>
<td> <input type = "text" name = "lc"></td></tr>
<!-- <tr><td>Lab Location</td>
<td> <input type = "text" name = "ll"></td></tr> -->
<tr><td colspan="2" align="center"><input type ="submit" value= "Save"></td></tr>
</form>


</table>


<?php
$mysqli = new mysqli('localhost','ashesics_amm4002','89lgfy3a9glf','ashesics_margaret_ayodele');
//chekcs if connection has been established 
 if($mysqli->connect_errno){
 	echo "Error connecting to database!";
 }
if(isset($_REQUEST['ln'])){  

include("labs.php");
$obj = new labs();

$lab_id=$_REQUEST['lid'];
$lab_name=$_REQUEST['ln'];
$lab_type=$_REQUEST['lc'];
// $lab_location=$_REQUEST['ll'];


if(!$obj->add_lab($lab_id,$lab_name,$lab_type)){

echo "Error adding".mysql_error();
}
else
{
echo " $lab_name has successfully being added to the database";
}

$result = $mysqli->query("select * from labs");

if($result==false){
 		echo "Error running database insert query";

  }
    //It creates alternate bakground for the rows for easy reading
    $row= $result->fetch_assoc();
     echo "<table border='1'>";
	 echo "<tr style='background-color:steelblue; text-align:center ;font-family:Georgia'>
	 <td>LAB ID</td><td>LAB NAME</td><td>LAB TYPE</td></tr>";
     

	$style="";
	$i=0;
	while($row){
		if($i%2==0){
			$style="style='background-color:lightsteelblue;font-family:Georgia'";
		}else{
			$style="style='font-family:Georgia'";
		}
		echo "<tr $style >";
		echo "<td align=center>{$row["Lab_Id"]}</td>";
		echo "<td align=left>{$row["Lab_Name"]}</td>";
		echo "<td align=left>{$row["Lab_Type"]}</td>";
		// echo "<td align=left>{$row["lab_location"]}</td>";
		echo "</tr>";
		$row= $result->fetch_assoc();
		$i++;
	
}

					}
?>

</div>

</table>
</body>
</html>