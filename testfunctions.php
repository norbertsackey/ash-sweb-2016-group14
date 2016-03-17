<?php

include_once("Equipment.php");


$obj = new Equipment();

$descrip = 'a voltmeter for measuring potential difference';
$price = 50;
$category = 'Electrical Apparatus';
$manufacturer = 'Solatec';
$quantiy = 9;
$status = 'reserved';
$supplierID = 93022910;
 if(!$obj->addEquipment($name,$descrip,$price,$category,$manufacturer,$quantiy,$status,$supplierID)){

 	echo "Equipment addition not successful";
}
 
 else{

	echo "New Equipment added";
}


?>