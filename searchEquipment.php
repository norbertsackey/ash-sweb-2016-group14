<html>
<head>
<title>Index</title>
<link rel="stylesheet" href="css/s.css">
</head>

<div class = "rh">
<a  href="#"><b>Login</b></a>
</div>
<div class = "center">
<body>
<head>
<img style="position: absolute; top: -1%; left:22%; margin: 30px -30px -30px 30px;" src="Ashesi.jpg" width="120" />

<p style = "text-align:center; font-size: 30px"><b>Ashesi University College<b></p>
<p style = "text-align:center ; font-size: 25px"><b>Inventory Management System<b></p>
 <nav>
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="laboratories.php">Laboratories</a></li>
<li><a href="manufacturers.php">Manufactures</a></li>
<li><a href="students.php">Students</a></li>
</ul>
</nav>
</head>
</div>

<div class = "center1" style="text-align:center" >
<br><ul class = 'm'>
<li><a href = 'addItem.php'>Add an Item </a></li>
<li><a href = '#'>View Profile of One Item</a></li><br>
</div>
<div class = "center1" >
<div style="text-align: center"></div>
<p style = "text-align:center; font-size: 30px"><b>List of Items in Labs<b></p>
</div>
<div class = "center1" style="text-align:center" >

	        <?php

include_once("inventory.php");
$obj=new inventory();
$search_text="";
if(isset($_REQUEST['txtSearch'])){
$search_text=$_REQUEST['txtSearch'];
}
$obj->search_by_name($search_text);
echo "<table border='1'>";
echo "<tr style='background-color:olive; color:white; text-align:center'>
<td>Name of Equipment</td>
<td>Description of Equipments</td>
<td>Equipment ID </td>
<td>Price of Equipment</td>
<td> Options / Delete</td>
</tr>";
							
$row=$obj->fetch();
$style="";
$i=0;
while($row){
if($i%2==0){
$style="style='background-color:Khaki'";
}else{
$style="";
}
echo "<tr $style >";
echo "<td><span class='clickspot' onclick='getDesc({$row['equipment_id']})'>{$row['equipment_name']}<span></td>";
echo "<td>{$row['description']}</td>";
echo "<td>{$row['equipment_id']}</td>";
echo "<td>{$row['price']}</td>";
echo "<td><a href='editeqpt.php'>edit</a> <a href='searchEquipment.php'>delete</a></td>";
echo "</tr>";
$row=$obj->fetch();
$i++;
}

if(isset($_REQUEST['equipment_name'])){
	echo $_REQUEST ['equipment_name'];

    $obj = new inventory();
	$equipment_name=$_REQUEST['equipment_name'];

    if(!$obj->delete_equipment($equipment_name)){

	echo "Error deleting".mysql_error();
	}
	else
	{
	header("location:searchEquipment.php");
	}
	}
	?> 

	</div>

	</body>
	</html>



