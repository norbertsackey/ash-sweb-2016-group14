<?php
/**
 * author: Makani Mweembe
 * date: 25th March, 2016
 * description: Class with queries to access the users table
 */
include_once ("adb.php");
class user extends adb {
/**
 * [[The verify_user function checks if a user exists]]
 * @param [[int]] $user
 */
  function verify_user($User_Id){
    $str_query = "select User_Id from users where User_Id='$User_Id'";
    if(!$this->query($str_query)){
      return false;
    }
    else {
      return true;
    }
  }
  
}

?>