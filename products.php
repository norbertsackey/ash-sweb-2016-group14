<?php
/**
*/
include_once("adb.php");
/**
*Products  class
*@auth: Naa Korkoi Larmie
*/
class lab_tools extends adb{
	function lab_tools(){
	}
	
	function addtool ($toolid, $manufacturername, $toolname, $quantity, $dateadded, $status, $precaution,$labnum){
		$strQuery="insert into lab_tools set
                        tool_id= '$toolid',
                        manufacturer_name='$manufacturername',
						Tool Name='$toolname',
						Quantity='$quantity',
						Date Added='$dateadded',
                        Status='$status',
                    Precaution ='$precaution',
                    Lab Number= '$labnum' ";
				return $this->query($strQuery);				
	}
	/**
	*gets product records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getlab_tools($filter=false){
		$strQuery="select * from lab_tools";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		return $this->query($strQuery);
	}
	
	/**
	*Searches for user by username, firstname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchlabTools($text=false){
		$filter=false;
		if($text!=false){
			$filter=" Tool Name like '$text' ";
		}
		
		return $this->getProducts($filter);
	}
	
	/**
	*delete product
	*@param int usercode the product code to be deleted
	*returns true if the product is deleted, else false
	*/
	function deleteProduct($productId){
        	/*Compelete the function*/
        $strQuery ="Delete * from  from Products where productId like '$productid' ";
	return $this->query($strQuery);
		}

}
?>
