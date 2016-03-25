<?php
/**
		*@Author:    Margaret Morenike Ayodele
		*@Date:      16th March, 2016
		*@Assignment:Webtechnolgy Implementation
		*@category   Inventory Management
		*@package    Ajax
		*@version    2.2
		*@param      declares $lab_id, $lab_name, $capacity & $location
		*            as variables of the Ajax class 
	**/

$cmd=$_REQUEST['cmd'];
switch($cmd)
{
	case 1:
	include("labs.php");
	$obj=new Lab();
	$id=$_GET['id'];
	$name=$_GET['name'];
	$capacity=$_GET['capacity'];
	$location=$_GET['location'];
	$row=$obj->addLabs($id, $name, $capacity, $location);
	
	/*return a JSON string to browser when request comes to get description*/
	break;
	case 2:
	include("labs.php");
	$obj=new Labs();
	if($row=$obj->get_lab()){		
		echo '{"result":1,"message":[';
		while ($row){
			echo json_encode($row);
			$row=$obj->fetch();
			if ($row) {
				echo ",";
			}
		}
		echo "]}";
	}
	else{
		echo '{"result":0,"message": "reading not removed."}';
	}
	break;	

	case 3:
	break;
	case 4:
	break;

	default:

}
?> 
