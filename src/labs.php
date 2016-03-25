<?php
/**
	*@Author : Margaret Morenike Ayodele
	*@Date: 16th March, 2016
	*@Assignment: Webtechnology Implementation Assignment
	*@category   Inventory Management
	*@package    Laboratories
	*@version    2.0
	*@param      declares $lab_name, $lab_id, $lab_capacity & $lab_location, $equip_id & 
	*            $supplier_id as variables of Labs class 
**/

header('Access-Control-Allow-Origin: *');

/* side effect: load a file*/ 
include("adb.php");

/* The name of the class*/
class Labs extends adb
{


/**
    *@method boolean search_lab($lab_name,$lab_id,$lab_location,$equip_id) allows users 
    *to search for labs by their names, id and physical locations 
    *@param String $lab_name// The name of a lab
	*@param integer $lab_id// The assigned id of a lab
	*@param varchar $location// The assigned location of a lab
    *@param $str_query// this ia a variable that holds the query. 
    *It searches through the database to get the lab information if any 
	*@return $this->fetch()//this returns the value of the query if there is any in the database. 
**/
	function search_lab($lab_name,$lab_id,$lab_location,$equip_id)
	{
		$str_query="select * from labs where lab_name= '$Lab_name',lab_id = '$lab_id', 
		lab_location ='$lab_location', $equip_id = equip_id'";
		
		return $this->fetch();
	
	}
	
/** 
	*@method boolean add_lab($lab_name, $lab_id,$lab_location,$capcaity,$equip_id,$supplierID) 
	* allows the Admin to add new labs given their names, ids, location and capacity
	*@param String $lab_name// The name of a lab
	*@param integer $lab_id// The assigned id of a lab
	*@param varchar $lab_location// The assigned location of a lab
	*@param integer $capacity// The equipment capcity of a lab
	*@param integer $equip_id// The assigned id for an equipment
	*@param integer $supplierID// The assigned id for a supplier
	*@param $str_query// this ia a variable that holds the query. 
	*It searches through the database to get the lab information if any 
	*@return $this->query()//this returns the value of the query if there is any in the database. 
**/
	function add_lab($lab_name,$lab_id,$lab_location,$capcaity,$equip_id,$supplierID)
	{
		$str_query="insert into labs set lab_name='$lab_name',lab_id='$lab_id',
		lab_location ='$lab_location',capcaity='$capcaity','equip_id = $equip_id',
		'$supplierID =supplier_id' ";

        return $this->query($str_query);
	}

/** 
	*@method boolean delete_lab($lab_id)allows the Admin to remove labs given their id
	*@param integer $id// The assigned id of a lab
	*@param $str_query// this ia a variable that holds the query. 
	*It searches through the database to get the lab information if any 
	*@return $this->query()//this returns the value of the query if there is any in the database. 
**/
	function delete_lab($lab_id)
	{
		$str_query="delete from labs where lab_id='$lab_id'";

	    return $this->query($str_query);	 
	}

/** 
	*@method boolean edit_lab($lab_name, $lab_id,$lab_location,$capcaity)allows the Admin 
	*to modify labs given their names, id, physical location and capacity
	*@param String $lab_name// The name of a lab
	*@param integer $lab_id// The assigned id of a lab
	*@param varchar $lab_location// The assigned location of a lab
	*@param integer $capacity// The equipment capcity of a lab
	*@param $str_query// this ia a variable that holds the query. 
	*It searches through the database to get the llab information if any 
	*@return $this->query()//this returns the value of the query if there is any in the database. 
**/
	function edit_lab($lab_name,$lab_id,$lab_location, $capcaity)
	{
		$str_query="update labs set lab_name='$lab_name',lab_id='$lab_id',
		lab_location ='$lab_location',capcaity='$capcaity'";	

	    return $this->query($str_query);	
	}
}
?>