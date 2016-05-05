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
		case 3:
			viewSuppliers();
			break;
		default:
			echo "wrong cmd";	
			break;
	}
	
	function updateSupplier(){
        include("suppliers.php");
        $obj = new suppliers();
        
		//check if there is a user code
		if(!isset($_REQUEST['us']) && ($_REQUEST['name']) && ($_REQUEST['phone'])&&($_REQUEST['email']))
        {//continue to check the url for the name, phone and email
            echo "not all details passed";
        }
		else{
        $updatesupplier=$_REQUEST['us'];
        $updatesupplier=$_REQUEST['name'];
        $updatesupplier=$_REQUEST['phone'];
        $updatesupplier=$_REQUEST['email'];
            
		//after the other details have been found use $_GET to pass them ino them the function as parameters
		if($obj->updateSupplier($_GET['us'],$_GET['name'],$_GET['phone'],$_GET['email'])){
			echo "Supplier Updated";
            header ("location: suppliersview.php");
		}else{
			echo "Supplier was not updated.";
		}
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
		$obj=new suppliers();
		//delete the user
		if($obj->addSupplier($sid, $name, $phone, $email)){
			echo "Supplier Added";
		}else{
			echo "Supplier was not Added.";
		}
           
	}

	function viewSuppliers(){
		include_once("suppliers.php");
//				if(!isset($_REQUEST['us']))
//                {
//			echo '{"result":0,"message":"Supplier ID provided not"}';		
//			return;
//		}
		
//		$usercode=$_REQUEST["us"];
		//create an object of suppliers
		$obj=new suppliers();
		// call get user method
        $obj->getAllSuppliers();
		$row = $obj->fetch();
        
		if(!$row){
			echo '{"result":0,"message":" Supplier ID not provided"}';	
		}
		else{
            echo '{"result":1,"suppliers":[';
            while($row){
                echo json_encode($row);
//                echo "hfchyygv";
                if ($row=$obj->fetch()){
                    echo ",";
                }
            }
		echo "]}";
	}
    }

?>