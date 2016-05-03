<?php
/**
   * @author Benedicta Amo Bempah
   * @copyright 2016
   ** description: A main class to manage all classes. This class communicates with DB
   */ 

	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			deleteUser();	//if cmd=1 the call delete
			break;
		case 2:
			userStatus();	//if cmd=2 the change status
		default:
			echo "cmd not available or wrong";	//change to json message
			break;
	}
	
	function deleteUser(){
		//check if there is a user code
		if(!isset($_REQUEST['student_id'])){
			echo "student_id is not given";	//change to json message	
			exit();
		}
		
		$userid=$_REQUEST['student_id'];
		include_once("users.php");
		$obj = new users();

		//delete the user
		if($obj->deleteUser($userid)){
			echo "User has been successfully deleted";
		}
		else{
			echo "User deletion unsuccessful ";
		}
	}
	
	function userStatus(){
		include_once("users.php");
		// the user code from the request array
		if(!isset($_REQUEST['status'])){
			echo '{"message":"user code is not correct"}';
			return;
		}

		$changeStatus=$_REQUEST['status'];
		//create an object of users
		$obj = new users();

		// call change status method of user class
		$row = $obj->getUsers($changeStatus);

		//print_r($row);
		if($row==false){
			echo "0";
			return;
		}

		//if current status is 2 then change it to 1
		if($row["NSTATUS"]==2){
			$result=$obj->userStatus($changeStatus,enabled);
		}else{	//esle change status to 2
			$result=$obj->userStatus($changeStatus,NewUser);
		}
		
		if($result==false){
			echo "0";	
			return false;
		}
		//return json message
		echo '{"result":1,"message":"student status changed"}';
			
	}

?>