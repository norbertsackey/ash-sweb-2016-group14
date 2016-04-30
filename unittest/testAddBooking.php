<?php
include_once("..\Booking.php");

class testAddBooking extends PHPUnit_Framework_TestCase
{
    public function testAddBooking()
    {
		
$obj = new Booking();

$EquipID = 3;
$labID = 4;
$studID = 7;
		
    $this->assertEquals(true,$obj->addBooking($EquipID,$labID,$studID));

    }
	

	
}