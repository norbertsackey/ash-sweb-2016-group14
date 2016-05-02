<?php
/**
 * author: Makani Mweembe
 * date: 25th March, 2016
 * description: Class with queries to access the equipments and 
 */

include_once ("adb.php");

class implementations extends adb {

/**
 * [[The check_out_equipment function is to add a transaction to the database after an equipment is logged out]]
 * @param [[int]] $user
 * @param [[int]] $equipment
 * @param [[date]] $date_borrowed
 * @param [[expected date_to_be_returned]]
 */
  function checkout_equipment($Equip_Id, $date_Borrowed, $expected_date_of_return){

  	$str_query = "insert into borrowers (Equip_Id, date_Borrowed, expected_date_of_return) values ($Equip_Id, '$date_Borrowed', '$expected_date_of_return')";
    return $this->query($str_query);
  }
/**
 * [[The checkin quipment function records the equipments that have be been returned]]
 * @param [[int]] $equipment
 * @param [[date_returned]]
 */
  function checkin_equipment($Equip_Id, $date_returned){
    $str_query = "update borrowers set date_returned='$date_returned' where Equip_Id='$Equip_Id' and date_returned=NULL";
    return $this->query($str_query);
  }
}


//print_r($obj->fetch());

?>


