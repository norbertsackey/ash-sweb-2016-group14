 <?php
 header("Location :bookingsView.php");
   include_once("Equipment.php");
   	//check for user code
      if(isset($_REQUEST['Eid'])){
      $EquipID = $_REQUEST['Eid'];
      $command = $_REQUEST['cmd'];

       $obj = new Equipment();

      if($command=='Reserve'){

         if(!$r=$obj->bookEquipment($EquipID)){
            echo "Error reserving equipment";
         }
         else
          echo "equipment reserved successfully";
      }
     else if($command=='Unreserve'){

         if(!$r=$obj->unbookEquipment($EquipID)){
             echo "Error releasing equipment";
         }
         else
          echo "equipment released successfully";
      }

      else{

        echo "unknown command";
      }

    }

    ?>