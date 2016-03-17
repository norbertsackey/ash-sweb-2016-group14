<?php
/**
*/
include_once("adb.php");
/**
*Equipment class
*/
class Equipment extends adb{
	
	function Equipment(){
		
	}


	function addEquipment($name,$descrip,$price,$category,$manufacturer,$availQuantity,$totalQuantiy,$status,$supplierID){
		$strQuery="insert into equipment set
		                name='$name',
						descrip='$descrip',
						price='$price',
						category='$category',
						manufacturer='$manufacturer',
						availQuantity='$availQuantiy',
						totalQuantity='$totalQuantiy',
						status='$status',
						supplierID='$supplierID';";
				 return $this->query($strQuery);				
	}

	function searchEquipment($searchTerm){
		$strQuery="select name,descrip,price,category,manufacturer,availQuantity,totalQuantity,status,supplierID from equipment where name like '%$searchTerm%' or description like '%$searchTerm%' or category like '%$searchTerm%';";
				 return $this->query($strQuery);				
	}

	function getEquipment( ){
		$strQuery="select name,descrip,price,category,manufacturer,availQuantity,totalQuantity,status,supplierID from equipment where name like '%$searchTerm%' or description like '%$searchTerm%' or category like '%$searchTerm%';";
				 return $this->query($strQuery);				
	}

	

}
?>