<?php
/**
*/
include_once("adb.php");
/**
*Equipments  class
*/
class equipment extends adb{
    function equipment (){
        
    }
	//function lab_tools()
	
	function addequipment ($equipId, $equipName,$desc,$status,$category,$price,$equipManufacturer, $labId, $supplierId){
		$strQuery="insert into equipment set
						Equip_ID='$equipId',
						Equip_Name =$equipName,
						Equip_Description =$desc,
						Equip_Status=$status,
						Equip_Category =$category,
                        Equip_Price=$price,
                         Equip_Manufacturer= $equipManufacturer,
                         Lab_Id= $labId,
                         Supplier_Id= $supplierId"
          ;
		return $this->query($strQuery);				
	}
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getequipment($filter=false){
		$strQuery="SELECT Equip_ID, Equip_Name, Equip_Description, Equip_Status, Equip_Category, Equip_Price, Equip_Manufacturer, Lab_Id, Supplier_Id  FROM equipment";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
        // echo $strQuery;
		return $this->query($strQuery);
	}
	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
//	function searchUsers($text=false){
//		$filter=false;
//		if($text!=false){
//			$filter=" USERNAME like '%$text%' or FIRSTNAME like '%$text%' or LASTNAME like '%$text%'  ";
//		}
//		
//		return $this->getUsers($filter);
//	}
	
	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
//	function deleteUser($usercode){
//        	/*Compelete the function*/
//        $strQuery ="Delete * from  from users where USERCODE like '$usercode'";
//	return $this->query($strQuery);
//		}

}
?>
