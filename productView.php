<?php

	//1) Create object of products class
	include_once ("products.php");
     $obj = new lab_tools();
	
	//2) Call the object's gettools_lab method and check for error
                    //search for Products
                if(isset($_REQUEST['txtSearch'])){
                     $obj->searchlabTools($_REQUEST['txtSearch']);
                  }else {
$r=$obj-> getlab_tools();
                    }
                    if(!$r){
                        echo "error getting Tools";
}
                    
          if (!$obj->getlab_tools())  {
              echo "error";
//          }        
//	return $this->getProducts($filter);
                    
	
	//3) show the result
                    echo "<table border='1' ><tr><td>Tool ID</td><td>Manufacturer NAME</td><td>Tool Name</td><td>Qunatity</td><td>Date Added</td><td> Status</td><td>Precautions</td><td>Lab Number</td></tr>";
                        
while ($row=$obj->fetch ()){
    echo "<tr>";
    echo "<td> {$row['tool_id']}</td>";
   echo "<td>{$row['manufacturer_name']}</td>";
    echo "<td>{$row['tool_name']}</td>";
    echo "<td>{$row['quantity']}</td>";
    echo "<td>{$row['date_added']}</td>";
     echo "<td>{$row['status']}</td>";
        echo "<td>{$row['precautions']}</td>";
        echo "<td>{$row['lab_no']}</td>";
    
        echo "</tr>";
    }
                    echo "</table>";
                    
	
	
	
          }
	
	
?>
