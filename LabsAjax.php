 <?php

if(!isset($_REQUEST['cmd'])){
        echo "cmd is not provided";
        exit();
    }

$cmd=$_REQUEST['cmd'];
    switch($cmd){
        case 1:
             viewLabs();
            break;
        case 2:
             liveSearch(); 
            break;
        default:
            echo "unknown command";   
            break;
    }
  

    function viewLabs(){

     if(!isset($_REQUEST['lab_id'])){
            echo "Lab ID is not given";   //change to json message    
            exit();
        }

        include_once("Labs.php");
        $obj = new Labs();
        $BooknID = $_REQUEST['lab_id'];

        if (!$obj->viewLabs($lab_id)) {
            echo "Error searching lab";
        } else
            echo "lab search was successful";
            header("Location :LabsView.php");
     
     }

   function liveSearch(){

    if(isset($_REQUEST['txtSearch'])){
        include_once('Labs.php');
        $obj = new Labs();

        $search_text = $_REQUEST['txtSearch'];
  
      if(!$obj->searchLabs($search_text)){
    
        echo '{"result":0,"message": "search did not work."}';
        return;
    }
           
       $row=$obj->fetch();
        echo '{"result":1,"Labs":[';  
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