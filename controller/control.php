<?php
/**
 * author: Makani Mweembe
 * date: 3rd April , 2016
 * description: controller page, interfaces with javascript to process commands from the frontend
 */
  $cmd = $_REQUEST['cmd'];
  switch ($cmd) {
    case 1:
      checkout_equipment_cmd();
      break;
    case 2:
      checkin_equipment_cmd();
      break;
    default:
      # code...
      break;
  }
  /**
   * [[The checkout_equipment function is to add a transaction to the database after an equipment is logged out, runs
   * when called from the view]]
   */
  function checkout_equipment_cmd(){
    include ("../model/implementations.php");
    $obj = new implementations();
    //$User_Id = $_REQUEST['User_Id'];
    $Equip_Id = $_REQUEST['Equip_Id'];
    $date_Borrowed= $_REQUEST['date_Borrowed'];
    $expected_date_of_return = $_REQUEST['$expected_date_of_return'];
    if(verify_equipment_helper($Equip_Id)){
      if(verify_user_helper($User_Id)){
        if($obj->checkout_equipment( $Equip_Id, $date_Borrowed, $expected_date_of_return)){
          echo '{"result":1,"message": "checked out successfully"}';
        }
        else{
          echo '{"result":0,"message": "checking out unsuccessful."}';
        }
      }
    }
  }
  /**
   * [[The checkin_equipment_cmd function is to insert an equipment in the borroweres table,it runs after it has been called from the view equipment]]
   */
  function checkin_equipment_cmd(){
    include ("../model/implementions.php");
    $obj = new implementions();
    $Equip_Id = $_REQUEST['Equip_Id'];
    $date_returned = $_REQUEST['$date_returned'];
    if(verify_equipment_helper($Equip_Id)){
        if($obj->checkin_equipment($Equip_Id, $date_returned)){
          echo '{"result":1,"message": "checked in successfully"}';
        }
        else{
          echo '{"result":0,"message": "transaction not added."}';
        }
      }
    }
  /**
   * [[The verify_equipment_helper verifies that an equipment exists before any action can be performed on it ]]
   * @param [[int]] $equipment
   */
  function verify_equipment_helper($Equip_Id){
    include ("../model/equipment.php");
    $obj = new equipment();
    if($obj->verify_equipment($Equip_Id)){
      return true;
    }
    else{
      return false;
    }
  }
  /**
   * [[This function verifies that a user exits before any action can be performed]]
   * @param [[int]] $user
   */
  function verify_user_helper($User_Id){
    include ("../model/users.php");
    $obj = new user();
    if($obj->verify_user($User_Id)){
      return true;
    }
    else{
      return false;
    }
  }
?>