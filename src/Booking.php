<?php

include_once("adb.php");

/**
 * Booking class
 */
class Booking extends adb {

    function Booking() {
        
    }

/**
	*Adds a new booking
	*@param int EquipID  ID of equipment
	*@param timestamp timeBooked timestamp of the moment equipment was booked by a user
	*@param int User_ID ID of student who booked equipment
	*@return boolean returns true if successful or false 
	*/
     
    function addBooking($Equip_Id,$User_Id) {
        $strQuery = "insert into bookings set
                        User_Id = '$User_Id',
		                Equip_Id='$Equip_Id';";
        return $this->query($strQuery);
    }


/** 
*@param int userID ID of student who booked equipment
*/
     function searchBookings($User_Id) {
        $strQuery = "select Equip_ID,User_Id from bookings where User_Id= '$User_Id'";
        return $this->query($strQuery);
    }

/**
	*returns all equipment from database
	*@return boolean returns true if successful or false 
	*/
    function getBookings() {
        $strQuery = "select User_Id,Equip_ID,time_Booked from bookings;";
        return $this->query($strQuery);
    }

    }