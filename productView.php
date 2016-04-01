<?php

	//1) Create object of products class
	include_once ("products.php");
     $obj = new equipment();
    $filter = false;


    $row = $obj->getequipment();
	

    if(!$row) {
        echo "Error getting tools";
    }                 
	
	//3) show the result
                    echo "<table border='1' ><tr><td>Equipment ID</td><td>Equipment Name</td><td>Equipment Description</td><td>Equipment Status</td><td>Equipment Category</td><td> Equipment Price</td><td> Equipment Manufacturer</td><td>Lab Id</td><td> Supplier Id</td></tr>";
              //$row=$obj->fetch ();
                        
while ($row=$obj->fetch()){
    echo "<tr>";
        echo "<td> {$row['Equip_ID']}</td>";
        echo "<td>{$row['Equip_Name']}</td>";
        echo "<td>{$row['Equip_Description']}</td>";
        echo "<td>{$row['Equip_Status']}</td>";
        echo "<td>{$row['Equip_Category']}</td>";
        echo "<td>{$row['Equip_Price']}</td>";
        echo "<td>{$row['Equip_Manufacturer']}</td>";
        echo "<td>{$row['Lab_Id']}</td>";
        echo "<td>{$row['Supplier_Id']}</td>";
    
    echo "</tr>";
    // $row=$obj->fetch ();
    }
                    echo "</table>";
	
	
?>
