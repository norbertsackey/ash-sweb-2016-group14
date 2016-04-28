<?php

/**
* Including the adb class
*/
include_once("adb.php");

/**
*Equipment class extends the adb class
*/
class equipment extends adb {

	/**
	*Gets tools based on filter
	*@param string mixed condition to filter. If false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getTools($filter=false) {
		$strQuery="SELECT Equip_ID, Equip_Name, Equip_Description, Equip_Status, Equip_Category, Equip_Price, Equip_Manufacturer, Lab_ID, Supplier_ID FROM equipment";
		if($filter!=false) {
			$strQuery=$strQuery . " where $filter";
		} 
		return $this->query($strQuery);
	}

	/**
	*Searches tools based on the filter
	*@param string mixed condition to filter. If false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function searchTool($text=false) {
		$filter=false;
		if($text!=false) {
			$filter= "Equip_ID like '%$text%' or Equip_Name like '%$text%' or Equip_Description like '%$text%' or Equip_Status like '%$text%'
						or Equip_Category like '%$text%' or Equip_Price like '%$text%' or Equip_Manufacturer like '%$text%' or Lab_Id like '%text%' or Supplier_Id like '%text%'";
		}
		return $this->getTools($filter);
	}

	/**
	*Adds a new user
	*@param int equipid equipment id
	*@param string equipname equipment name
	*@param string equipdescription equipment description
	*@param string equipstatus equipment status
	*@param string equipcategory equipment category
	*@param int equipprice equipment price
	*@param string equipmanufacturer equipment manufacturer
	*@param string labid the lab id
	*@param string supplierid the supplier's id
	*@return boolean returns true if successful or false 
	*/
	function addTool($equipid, $equipname, $equipdescription, $equipstatus, $equipcategory, $equipprice, $equipmanufacturer, $labid, $supplierid) {

		$strQuery="INSERT INTO equipment SET 
								Equip_ID= '$equipid',
								Equip_Name = '$equipname',
								Equip_Description = '$equipdescription',
								Equip_Status = '$equipstatus',
								Equip_Category = '$equipname',
								Equip_Price = '$equipprice',
								Equip_Manufacturer '$equipmanufacturer',
								Lab_Id = '$labid'
								Supplier_Id = '$supplierid'";
							return $this->query($strQuery);
	}

	/** 
	*Edits the Name of the equipment
	*@param int equipID, the equipment id
	*@param txtName, the value of the new text
	*@return boolean returns true if successful or false 
	*/
	function editName($equipID,$txtName) {
		$sql = "UPDATE equipment SET Equip_Name = '$txtName' WHERE Equip_ID = '$equipID'";
		
		$result = $this->query($sql);
		if ($result) {
			return $result;
		}
	}

	/** 
	*Edits the Description of the equipment
	*@param int equipID, the equipment id
	*@param txtName, the value of the new text
	*@return boolean returns true if successful or false 
	*/
	function editDescription($equipID, $txtName) {
		$sql = "UPDATE equipment SET Equip_Description = '$txtName' WHERE Equip_ID = '$equipID'";

		$result = $this->query($sql);
		if ($result) {
			return $result;
		}
	}

	/** 
	*Edits the Status of the equipment
	*@param int equipID, the equipment id
	*@param txtName, the value of the new text
	*@return boolean returns true if successful or false 
	*/
	function editStatus($equipID, $txtName) {
		$sql = "UPDATE equipment SET Equip_Status = '$txtName' WHERE Equip_ID = '$equipID'";

		$result = $this->query($sql);

		if ($result) {
			return $result;
		}
	}

	/** 
	*Edits the Category of the equipment
	*@param int equipID, the equipment id
	*@param txtName, the value of the new text
	*@return boolean returns true if successful or false 
	*/
	function editCategory($equipID, $txtName) {
		$sql = "UPDATE equipment SET Equip_Category = '$txtName' WHERE Equip_ID = '$equipID'";

		$result = $this->query($sql);
		if ($result) {
			return $result;
		}
	}

	/** 
	*Edits the Price of the equipment
	*@param int equipID, the equipment id
	*@param txtName, the value of the new text
	*@return boolean returns true if successful or false 
	*/
	function editPrice($equipID, $txtName) {
		$sql = "UPDATE equipment SET Equip_Price = '$txtName' WHERE Equip_ID = '$equipID'";

		$result = $this->query($sql);
		if ($result) {
			return $result;
		}
	}

	/** 
	*Edits the Manufacturer of the equipment
	*@param int equipID, the equipment id
	*@param txtName, the value of the new text
	*@return boolean returns true if successful or false 
	*/
	function editManufacturer($equipID, $txtName) {
		$sql = "UPDATE equipment SET Equip_Manufacturer = '$txtName' WHERE Equip_ID = '$equipID'";

		$result = $this->query($sql);
		if ($result) {
			return $result;
		}
	}

	/**
	*delete equipment by equipmentid
	*@param int equipmentid the equipment id to be deleted
	*@return returns true if the equipment is deleted, else false
	*/
	function deleteTool($equipid) {
		$sql = "DELETE FROM equipment WHERE Equipid = '$equipid'";

		$result = $this->query($sql);
		if ($result) {
			return $result;
		}
	}
}

?>