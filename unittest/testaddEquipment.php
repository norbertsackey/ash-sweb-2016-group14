<?php
include_once("..\Equipment.php");

class testAddEquipment extends PHPUnit_Framework_TestCase
{
    public function testAddEquipment()
    {
		
$obj = new Equipment();

$descrip = 'a voltmeter for measuring potential difference';
$price = 50;
$category = 'Electrical Apparatus';
$manufacturer = 'Solatec';
$quantiy = 9;
$status = 'reserved';
$supplierID = 93022910;
		
    $this->assertEquals(true,$obj->addEquipment($name,$descrip,$price,$category,$manufacturer,$quantiy,$status,$supplierID));

    }
	

	
}