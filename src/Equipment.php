<?php

/**
 */
include_once("adb.php");
include_once("Booking.php");

/**
 * Equipment class
 */
class Equipment extends adb {

    function Equipment() {
        
    }

/**
  *Gets tools based on filter
  *@param string mixed condition to filter. If false, then filter will not be applied
  *@return boolean true if successful, else false
  */
  function getTools($filter=false) {
    $strQuery="SELECT Equip_ID, Equip_Name, Equip_Description, Equip_Status, Equip_Category, Equip_Price, Equip_Manufacturer, Lab_Id, Supplier_Id FROM equipment";
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
      $filter= "Equip_Id like '%$text%' or Equip_Name like '%$text%' or Equip_Description like '%$text%' or Equip_Status like '%$text%'
            or Equip_Category like '%$text%' or Equip_Price like '%$text%' or Equip_Manufacturer like '%$text%' or Lab_Id like '%text%' or Supplier_Id like '%text%'";
    }
    return $this->getTools($filter);
  }

    

    /**
	*books an equipment that is 
	*@param int EquipID the ID for the equipment you want to reserve
	*@return boolean returns true if query is successful or false otherwise
	*/

    function bookEquipment($Equip_ID,$User_Id) {
        /*$newBooking = new Booking();
        $newBooking->addBooking($Equip_Id,$User_Id);*/
        $strQuery2 = "update equipment set Equip_Status = 'Reserved' where Equip_ID = '$Equip_ID';";
        return $this->query($strQuery2);
    }

  /**
	*searches for equipment based on a search term
	*@param int EquipID the ID for the equipment you want to reserve
	*@return boolean returns true if query is successful or false otherwise
	*/

    function unbookEquipment($Equip_ID,$User_Id) {
     
   /*    $strQuery2 = "update equipment set Equip_Status = 'Available' where Equip_ID = '$Equip_ID';";*/
       $strQuery1 = "delete from bookings where Equip_ID = '$Equip_ID' AND User_Id = '$User_Id';";
  

       return $this->query($strQuery1);


    }
    
    
  
}

