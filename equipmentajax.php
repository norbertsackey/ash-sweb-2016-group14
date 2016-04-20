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
			editCell();		//if cmd=1 the call delete
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}

	function viewEquipment(){
		include_once("equipment.php");
		//check if there is a equipment ID
		if(!isset($_REQUEST['Equip_ID'])){
			echo '{"result":0,"message":"Equipment ID not provided"}';		
			return;
		}
		
		$usercode=$_REQUEST["Equip_ID"];
		//create an object of users
		$obj=new equipment();
		// call get user method
		$row=$obj->getTools();
		if($row==false){
			echo '{"result":0,"message":"User code not provided"}';	
			return;
		}
		
		echo '{"result":1,"user":';
			echo json_encode($obj->fetch());
		echo '}';
	}

	// N E W  C O D E - Edit Cell
	function editCell() {
		include_once("equipment.php");
		// Check if there is a usercode from the request array
		if(!isset($_REQUEST["Equip_ID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["Equip_ID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of users in order to call the editName function
		$obj = new equipment();
		// Call the method editCell()
		$row = $obj->editCell($equipID,$txtName);
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			// echo json_encode($obj->fetch());
			// echo '}';
		}
		
	
?>