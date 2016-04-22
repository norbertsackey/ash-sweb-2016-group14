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
			saveName();		//if cmd=1 the call edit
			break;
		case 2:
			saveDescription();
			break;
		case 3: 
			saveStatus();
			break;
		case 4:
			saveCategory();
			break;
		case 5:
			savePrice();
			break;
		case 6:
			saveManufacturer();
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
	function saveName() {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["equipID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["equipID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method saveName()
		$row = $obj->editName($equipID,$txtName);
		// echo "Row is $row";
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
		}

	function saveDescription () {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["equipID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["equipID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method saveDescription()
		$row = $obj->editDescription($equipID,$txtName);
		// echo "Row is $row";
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
	}

	function saveStatus() {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["equipID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["equipID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method saveDescription()
		$row = $obj->editStatus($equipID,$txtName);
		// echo "Row is $row";
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
	}

	function saveCategory() {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["equipID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["equipID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method saveStatus()
		$row = $obj->editStatus($equipID,$txtName);
		// echo "Row is $row";
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
	}

	function saveCategory() {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["equipID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["equipID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method saveCategory()
		$row = $obj->editCategory($equipID,$txtName);
		// echo "Row is $row";
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
	}

	function savePrice() {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["equipID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["equipID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method savePrice()
		$row = $obj->editPrice($equipID,$txtName);
		// echo "Row is $row";
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
	}

	function saveManufacturer() {
		include_once("equipment.php");

		// Check if there is an equipment id from the request array
		if(!isset($_REQUEST["equipID"])) {
			echo '{"result":0,"message":"Equipment ID not provided"}';
			return;
		}

		$equipID = $_REQUEST["equipID"];
		$txtName = $_REQUEST["txtName"];

		// Create an object of equipment class in order to call the saveCell function
		$obj = new equipment();

		// Call the method saveDescription()
		$row = $obj->editManufacturer($equipID,$txtName);
		// echo "Row is $row";
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided}';
			return;
		}

		echo '{"result":1, "Text":"done"}';
			echo json_encode($obj->fetch());
			echo '}';
	}	
	
?>