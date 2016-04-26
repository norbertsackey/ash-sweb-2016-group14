<?php
	//Check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/* Get Command */
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

	/**
	*Save Name function
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

		echo '{"result":1, "message": "'.$txtName.'"}';
			echo json_encode($obj->fetch());
			echo '}';
		}

	/**
	*Save Description function
	*/
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

		echo '{"result":1, "message": "'.$txtName.'"}';
			// echo json_encode($obj->fetch());
			// echo '}';
	}

	/**
	*Save Status function
	*/
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
		//echo $row;
		
		if ($row == false) {
			echo '{"result":0,"message":"Text not provided"}';
			return;
		}

		echo '{"result":1, "message": "'.$txtName.'"}';
			// echo json_encode($obj->fetch());
			// echo '}';
	}

	/**
	*Save Category function
	*/
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

	/**
	*Save Price function
	*/
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

		echo '{"result":1, "message": "'.$txtName.'"}';
			echo json_encode($obj->fetch());
			echo '}';
	}

	/**
	*Save Manufacturer function
	*/
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

		echo '{"result":1, "message": "'.$txtName.'"}';
			echo json_encode($obj->fetch());
			echo '}';
	}	
	
?>