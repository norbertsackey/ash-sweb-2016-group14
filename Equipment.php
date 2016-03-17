<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class users extends adb{
	function Equipment(){
		
	}

	/**
	* this method adds a new user
	*@param string username login name
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param string usergroup group id
	*@param int permission permission as an int
	*@param int status status of the user account
	*@return boolean returns true if successful or false 
	*/
	function addEquipment($EquipID,$descrip,$price,$category,$manufacturer,$maint_date,$quantiy,status,supplierID){
		$strQuery="insert into Equipment set
						descrip='$descrip',
						price='$price',
						category='$category',
						manufacturer='$manufacturer',
						maint_date='$maint_date',
						quantiy='$quantiy',
						status='$status',
						supplierID='$supplierID';"
						
		return $this->query($strQuery);				
	}

	

}
?>