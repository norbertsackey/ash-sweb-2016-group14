<?php
	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			saveCell();		//if cmd=1 the call edit
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}

	// function viewEquipment(){
	// 	include_once("equipment.php");
	// 	//check if there is a equipment ID
	// 	if(!isset($_REQUEST['Equip_ID'])){
	// 		echo '{"result":0,"message":"Equipment ID not provided"}';		
	// 		return;
	// 	}
		
	// 	$usercode=$_REQUEST["Equip_ID"];
	// 	//create an object of users
	// 	$obj=new equipment();
	// 	// call get user method
	// 	$row=$obj->getTools();
	// 	if($row==false){
	// 		echo '{"result":0,"message":"Equipment ID not provided"}';	
	// 		return;
	// 	}
		
	// 	echo '{"result":1,"equipment":';
	// 		echo json_encode($obj->fetch());
	// 	echo '}';
	// }

	/**
	*Save Cell function
	*/
	function saveCell() {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["Equip_ID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["Equip_ID"];
		$txtName = $_REQUEST["txtName"];
		$columnID = $_REQUEST["columnid"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method saveCell()
		$row = $obj->editTool($columnID,$equipID);
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
		}
		
	
?>