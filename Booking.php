<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class users extends adb{
	function Booking()){
		
	}

	
	function addBooking($EquipID,$timeBooked,$adminID,$labID,$studID){
		$strQuery="insert into Equipment set
						EquipID='$EquipID',
						timeBooked='$timeBooked',
						adminID='$adminID',
						labID='$labID',
						studID='$studID';"
						
		return $this->query($strQuery);				
	}

	

}
?>