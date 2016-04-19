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
			deleteUser();		//if cmd=1 the call delete
			break;
		case 2:
			changeUserStatus();	//if cmd=2 the change status
			break;
		case 4:
			viewUser();
			break;
		case 5:
			editName();
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}
	
	function deleteUser(){
		//check if there is a user code
		if(!isset($_REQUEST['uc'])){
			echo "usercode is not given";	//change to json message	
			exit();
		}
		
		$usercode=$_REQUEST['uc'];
		include("users.php");
		$obj=new users();
		//delete the user
		if($obj->deleteUser($usercode)){
			echo "User deleted";
		}else{
			echo "User was not deleted.";
		}
	}
	
	function changeUserStatus(){
		include_once("users.php");
		// the user code from the request array
		if(!isset($_REQUEST["uc"])){
			echo '{"result":0,"message":"user code is not correct"}';
			//echo "0";
			return;
		}
		$usercode=$_REQUEST["uc"];
		//create an object of users
		$obj=new users();
		// call change status method of user class
		$row=$obj->getUser($usercode);
		//print_r($row);
		if($row==false){
			echo "0";
			return;
		}
		//if current status is 2 then change it to 1
		if($row["NSTATUS"]==2){
			$result=$obj->changeUserStatus($usercode,1);
		}else{	//esle change status to 2
			$result=$obj->changeUserStatus($usercode,2);
		}
		
		if($result==false){
			echo "0";	
			return false;
		}
		//return json message
		echo '{"result":1,"message":"status changed"}';
			
	}

	function viewUser(){
		include_once("users.php");
		//check if there is a user code
		if(!isset($_REQUEST['uc'])){
			echo '{"result":0,"message":"User code not provided"}';		
			return;
		}
		
		$usercode=$_REQUEST["uc"];
		//create an object of users
		$obj=new users();
		// call get user method
		$row=$obj->getUser($usercode);
		if($row==false){
			echo '{"result":0,"message":"User code not provided"}';	
			return;
		}
		
		echo '{"result":1,"user":';
			echo json_encode($row);
		echo '}';
	}

	// N E W  C O D E - Edit Name
	function editName() {
		include_once("users.php");
		// Check if there is a usercode from the request array
		if(!isset($_REQUEST["uc"])) {
			echo '{"result":0,"message":"User code not provided"}';
			return;
		}

		$usercode = $_REQUEST["uc"];
		// Create an object of users in order to call the editName function
		$obj = new users();
		// Call the method editName()
		$row = $ $obj->editName($usercode,$txtName);
		if ($row == false) {
			echo '{"result":0,"message":"Username not provided}';
			return;
		}

		echo '{"result":1, "Username":';
			echo json_encode($row);
			echo '}';
		}
		
	}
?>