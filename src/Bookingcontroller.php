 <?php

if(!isset($_REQUEST['cmd'])){
        echo "cmd is not provided";
        exit();
    }

$cmd=$_REQUEST['cmd'];
    switch($cmd){
        case 1:
             unbookEquipment();
            break;
        case 2:
             liveSearch(); 
            break;
        default:
            echo "unknown command";   
            break;
    }
  

    function unbookEquipment(){

     if(!isset($_REQUEST['Booking_Id'])){
            echo "Booking ID is not given";   //change to json message    
            exit();
        }

        include_once("Booking.php");
        $obj = new Booking();
        $BooknID = $_REQUEST['Booking_Id'];

        if (!$obj->unbookEquipment($BooknID)) {
            echo "Error releasing equipment";
        } else
            echo "equipment released successfully";
            header("Location :BookingsView.php");
     
     }

   function liveSearch(){

    if(isset($_REQUEST['txtSearch'])){
        include_once('Booking.php');
        $obj = new Booking();

        $search_text = $_REQUEST['txtSearch'];
  
      if(!$obj->searchBookings($search_text)){
    
        echo '{"result":0,"message": "search did not work."}';
        return;
    }
           
       $row=$obj->fetch();
        echo '{"result":1,"bookings":[';  
        while($row){
                echo json_encode($row);         
                $row=$obj->fetch();
                if($row){
                        echo ","; 
                }
        }
        echo "]}";

    }
}


?>