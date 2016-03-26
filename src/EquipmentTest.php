<?php

/**
 * Created by Norbert Sackey.
 * User: Norbert Sackey
 * Date: 3/25/2016
 * Time: 10:03 PM
 */

include_once('Booking.php');
include_once('Equipment.php');

class EquipmentTest extends PHPUnit_Framework_TestCase
{

    public function testAddBooking()
    {

        $obj = new Booking();

        $EquipID = 8878;
        $studID = 17792016;

        $this->assertEquals(true, $obj->addBooking($EquipID, $studID));

    }

    public function testbookEquipment()
    {

        $obj = new Equipment();

        $EquipID = 7878;
        $studID = 25892016;

        $this->assertEquals(true,$obj->bookEquipment($EquipID,$studID));

    }


    public function testunbookEquipment()
    {

        $obj = new Equipment();

        $EquipID = 7878;
        $studID = 25892016;

        $this->assertEquals(true,$obj->unbookEquipment($EquipID,$studID));

    }
        
}
