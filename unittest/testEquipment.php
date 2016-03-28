<?ph
include_once("..\equipment.php");

class testAdb extends PHPUnit_Framework_TestCase
{
    public function testGetTools()
    {
		// generate test equipment id
		//$strTestEquipID=random_bytes(10);
        $obj=new equipment();
		
        $this->assertEquals(true, 
		$obj->getTools(
			$strTestEquipID,// username sername
			'Equip_name',	//Equip name
			'Equip_Description',	//Equip Description
			'Equip_Status',			//Equip Status
			'Equip_Category',			//Equip Category
			'Equip_Price',			//Equip Price 
			'Equip_Manufacturer'			//Equip Manufacturer
			'Lab_Id'			//Lab Id
			'Supplier_Id'			//Supplier Id
			));
			
		$this->assertEquals(true,$obj->query("select * from users"));
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