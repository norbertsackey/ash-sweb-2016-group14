	 <?php

	/**
	    *@Author : Margaret Morenike Ayodele
	    *@Date: 16th March, 2016
	    *@Assignment: Webtechnology Implementation Assignment
	    *@category   Inventory Management
		*@package     Test Labs
	*/

	require ('labs.php');
	 
	/* The name of the class*/
	class labsTest extends PHPUnit_Framework_TestCase
	    {

	    public function setUp()
	    {

	        $lab = new Labs();
	    }
	    
        /**
            *@method boolean testadd_lab() allows an admin to add labs
            *by their names, id and physical locations 
            *@param String $lab_name// The name of a lab
	        *@param integer $lab_id// The assigned id of a lab
	        *@param varchar $lab_location// The assigned location of a lab
	        *@param integer $capacity// The equipment capacity of a lab
	        *@param integer $equip_id// The assigned id for an equipment
	        *@param integer $supplierID// The assigned id for a supplier
	        *@return $this->assertsEquals()//this returns true or false 
        **/
	    public function testadd_lab()
	    {
	        $labs = new Labs();
	        $result = $lab->add_lab("Physics lab", 208, "Engineering block", 100,
	         "EN0048", "SN0087");
	        $this->assertEquals(true, $result);
	        
	    }
        
         /**
            *@method boolean testsearch_lab() allows a user to search labs
            *by their names, id and physical locations 
            *@param String $lab_name// The name of a lab
	        *@param integer $lab_id// The assigned id of a lab
	        *@param varchar $lab_location// The assigned location of a lab
	        *@param integer $equip_id// The assigned id for an equipment
	        *@return $this->assertsEquals()//this returns true or false 
        **/
	    public function testsearch_lab()
	    {
	        $lab = new Labs();
	        $result = $lab->search_lab("Pysics lab",208,"Engineering block",
	        	"EN0048");
	        $this->assertEquals(true, $result);
	        
	    }

         /**
            *@method boolean testadd_lab() allows an admin to update labs
            *by their names, id and physical locations 
            *@param String $lab_name// The name of a lab
	        *@param integer $lab_id// The assigned id of a lab
	        *@param varchar $lab_location// The assigned location of a lab
	        *@param integer $capacity// The equipment capcity of a lab
	        *@return $this->assertsEquals()//this returns true or false 
        **/ 
	    public function testedit_Labs()
	    {
	        $lab = new Labs();
	        $result = $lab-> edit_lab("Pysics lab",208,"Engineering block",
	        	100);
	        $this->assertEquals(true, $result);
	        
	    }

         /**
            *@method boolean testadd_lab() allows an admin to remove labs
            *by their names, id and physical locations 
	        *@param integer $lab_id// The assigned id of a lab
	        *@return $this->assertsEquals()//this returns true or false 
        **/
	    public function testdelete_lab()
	    {
	        $lab = new Labs();
	        $result = $labs->delete_lab(208);
	        $this->assertEquals(true, $result);
	        
	    }
	 }


	?>
