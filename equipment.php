<?php

/**
*/
include_once("adb.php");

/**
*Equipment class
*/
class equipment extends adb {

	/**
	*Gets tools based on filter
	*@param string mixed condition to filter. If false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getTools($filter=false) {
		$strQuery="SELECT EQUIP_ID, EQUIP_NAME, EQUIP_DESCRIPTION, EQUIP_STATUS, EQUIP_CATEGORY, EQUIP_PRICE, EQUIP_MANUFACTURER FROM equipment";
		if($filter!=false) {
			$strQuery=$strQuery . " where $filter";
		} 
		return $this->query($strQuery);
	}


	/**
	*Searches tools based on the filter
	*@param string mixed condition to filter. If flase, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function searchTool($text=false) {
		$filter=false;
		if($text!=false) {
			$filter= "EQUIP_ID like '%$text%' or EQUIP_NAME like '%$text%' or EQUIP_DESCRIPTION like '%$text%' or EQUIP_STATUS like '%$text%'
						or EQUIP_CATEGORY like '%$text%' or EQUIP_PRICE like '%$text%' or EQUIP_MANUFACTURER like '%$text%'";
		}
		return $this->getTools($filter);
	}
}

?>