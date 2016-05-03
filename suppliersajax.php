<!--
@authour :Naa Korkoi Larmie
date 1May,2016
suppliersajax  class
-->



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
			updateSupplier();		//if cmd=1 update supplier
			break;
		case 2:
			addSupplier();	//if cmd=2 then add supplier
			break;
		case 4:
			viewSupplier();
			break;
		default:
			echo "wrong cmd";	
			break;
	}
	
	function updateSupplier(){
		//check if there is a user code
		if(!isset($_REQUEST['us'])){                                                                                                                                                                                                                                                                                                              
		}
		
		$updatesupplier=$_REQUEST['us'];
		include("suppliers.php");
		$obj=new supplier();
		//delete the user
		if($obj->updateSupplier($sid)){
			echo "Supplier Updated";
		}else{
			echo "Supplier was not updated.";
		}
    }
	
	
	function addSupplier(){
		include_once("suppliers.php");
		// the user code from the request array
		if(!isset($_REQUEST["us"])){
			echo '{"result":0,"message":"supplier not added"}';
			//echo "0";
			return;
		}
		$usercode=$_REQUEST["us"];
		//create an object of users
		$obj=new supplier();
		// call change status method of user class
		$row=$obj->addSupplier($sid, $name, $phone, $email);
		//print_r($row);
		if($row==false){
			echo "0";
			return;
		}
		//if current status is 2 then change it to 1
		$addsupplier=$_REQUEST['us'];
		include("suppliers.php");
		$obj=new supplier();
		//delete the user
		if($obj->addSupplier($sid, $name, $phone, $email)){
			echo "Supplier Added";
		}else{
			echo "Supplier was not Added.";
		}
           
	}

	function viewSupplier(){
		include_once("suppliers.php");
				if(!isset($_REQUEST['us'])){
			echo '{"result":0,"message":"Supplier ID not provided"}';		
			return;
		}
		
		$usercode=$_REQUEST["us"];
		//create an object of suppliers
		$obj=new supplier();
		// call get user method
		$row=$obj->getSupplier($name);
		if($row==false){
			echo '{"result":0,"message":" Supplier ID not provided"}';	
			return;
		}
		
		echo '{"result":1,"suppliers":';
			echo json_encode($row);
		echo '}';
	}

?>