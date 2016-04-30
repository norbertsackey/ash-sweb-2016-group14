<?php

include_once("adb.php");

/**
 * Booking class
 */
class Booking extends adb
{
    
    function Booking()
    {
        
    }
    
    /**
     *Adds a new booking
     *@param int EquipId  ID of equipment
     *@param timestamp timeBooked timestamp of the moment equipment was booked by a user
     *@param int User_Id ID of student who booked equipment
     *@return boolean returns true if successful or false 
     */
    
    function addBooking($Equip_Id, $User_Id)
    {
        $strQuery = "insert into bookings set
                        User_Id = '$User_Id',
		                Equip_Id='$Equip_Id';";
        return $this->query($strQuery);
    }
    
    
    
    /**
     * method to search for bookings related to an equipment with a particular name
     *@param  String EquipName equipment name you want to search for
     *@return boolean returns true if successful or false 
     */
    
    
    function searchBookings($EquipName)
    {
        $strQuery = "select Booking_Id,User_Id,bookings.Equip_Id,equipment.Equip_Name,equipment.Equip_Category,Time_Booked from equipment inner join bookings on bookings.Equip_Id = equipment.Equip_Id and Equip_Name like '%$EquipName%'";
        return $this->query($strQuery);
        
    }
    
    /**
     * method to remove a booking for an equipment
     *@param  int Booking_Id unique ID of a previous booking
     *@return boolean returns true if successful or false 
     */
    
    
    function unbookEquipment($Booking_Id)
    {
        
        $strQuery = "delete from bookings where Booking_Id = '$Booking_Id'";
        
        return $this->query($strQuery);
        
        
    }
    
    /**
     * method to cgange the status of an equipment to avaiilable
     *@param  int Equip_Id  ID of an equipment
     *@return boolean returns true if successful or false 
     */
    
    
    function releaseEquip($Equip_Id)
    {
        
        $strQuery = "update equipment set Equip_Status = Available where Equip_Id = '$Equip_Id'";
        
        /**
         * method to change the status of an equipment to reserved
         *@param  int Equip_Id  ID of an equipment
         *@return boolean returns true if successful or false 
         */
        
        
    }
    
    function bookEquip($Equip_Id)
    {
        
        $strQuery = "update equipment set Equip_Status = Reserved where Equip_Id = '$Equip_Id'";
        
        
    }
    
    
    /**
     * method to fetch for all bookings in the system
     *@return boolean returns true if successful or false 
     */
    
    function getBookings()
    {
        $strQuery = "select Booking_Id,User_Id,bookings.Equip_Id,equipment.Equip_Name,equipment.Equip_Category,Time_Booked from bookings inner join equipment on bookings.Equip_Id =equipment.Equip_Id ";
        return $this->query($strQuery);
    }
    
    
    
}