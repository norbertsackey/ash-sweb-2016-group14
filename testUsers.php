<?php
include_once("..\equipment.php");

class equipmentTest extends PHPUnit_Framework_TestCase{
    public function searchTool()
    {
		// generate test text
        $obj=new equipment();
		
        $this->assertEquals(true, 
		$obj->searchTool(
			"Prints",	//text
			));
			
		$this->assertEquals(true,$obj->query("SELECT * WHERE EQUIP_ID like '%$text%' or EQUIP_NAME like '%$text%' or EQUIP_DESCRIPTION like '%$text%' or EQUIP_STATUS like '%$text%'
						or EQUIP_CATEGORY like '%$text%' or EQUIP_PRICE like '%$text%' or EQUIP_MANUFACTURER like '%$text%''"));
		//count the number of fields
		$this->assertCount($obj->fetch());
    }

    public function getTools() {
    	// generate test text
        $obj=new equipment();
		
        $this->assertEquals(true, 
		$obj->getTools(
			"false",	//filter
			));
			
		$this->assertEquals(true,$obj->query("SELECT EQUIP_ID, EQUIP_NAME, EQUIP_DESCRIPTION, EQUIP_STATUS, EQUIP_CATEGORY, EQUIP_PRICE, EQUIP_MANUFACTURER FROM equipment"));
		//count the number of fields
		$this->assertCount($obj->fetch());
    }	
}