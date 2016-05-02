<?php
/**
 * author: Makani Mweembe
 * date: 25th March, 2016
 
 */
include_once ("adb.php");
class equipment extends adb {
/**
 * [[The verify_equipment function checks if an equipment exists]]
 * @param [[int]] $equipment
 */
  function verify_equipment($equipment){
    $str_query = "select Equip_ID from equipment where Equip_ID='$equipment'";
    if(!$this->query($str_query)){
      return false;
    }
    else {
      return true;
    }
  }
}
/*
testing the function to see if it works*/

/*$obj=new equipment();
if($obj->verify_equipment(2)){
	echo "equip";
}
else{
	echo "error";
}*/
?>