<?php
include_once("..\equipment.php");

class testAdb extends PHPUnit_Framework_TestCase
{
    public function testGetTools()
    {
		// generate test equipment id
		$strTestEquipID=random_bytes(10);
        $obj=new equipment();
		
        $this->assertEquals(true, 
		$obj->getTools(
			$strTestEquipID,// username sername
			"Volt Meter",	//Equip name
			"It is an equipment",	//Equip Description
			"Reserved",			//Equip Status
			"electrical",			//Equip Category
			544,			//Equip Price 
			Fluke			//Equip Manufacturer
			1236			//Lab Id
			2222			//Supplier Id
			));
			
		$this->assertEquals(true,$obj->query("select * from users where Equip_ID='$strTestEquipID'"));
		//count the number of fields
		$this->assertCount(7,$obj->fetch());
    }

    public function testSearchTool()
    {
		// generate test username sername
		$strTestText=random_bytes(10);
        $obj=new equipment();
		
        $this->assertEquals(true, 
		$obj->searchTool(
			"Volt",	//Equip name
			));
			
		$this->assertEquals(true,$obj->query("select * from users where $text='$strTestText'"));
		//count the number of fields
		$this->assertCount(7,$obj->fetch());
    }




	

	
}