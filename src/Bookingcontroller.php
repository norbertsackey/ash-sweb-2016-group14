 <?php

   include_once("Equipment.php");
   	//check for user code
      if(isset($_REQUEST['Equip_ID'])){
      $EquipID = $_REQUEST['Equip_ID'];
      $cmd = $_REQUEST['cmd'];

       $obj = new Equipment();

      if($cmd=='Reserve'){

         if(!$r=$obj->bookEquipment($EquipID,25892016)){
            echo "Error reserving equipment";
         }
         else
          echo "equipment reserved successfully";

         header("Location:EquipmentView.php");
         exit();
      }
     else if($cmd=='Unreserve'){

         if(!$r=$obj->unbookEquipment($EquipID,25892016)){
             echo "Error releasing equipment";
         }
         else
          echo "equipment released successfully";
          header("Location:BookingsView.php");
         exit();
      }
      else{

        echo "unknown command";
      }

    

    }
     

    ?>