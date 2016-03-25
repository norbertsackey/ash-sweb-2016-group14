<?php

include_once("user.php");


$obj = new User();

$fname = 'Derrick';
$lname = 'Morgan';
$passwd = 'hjggjfghjf';
$role = 'student';

 if(!$obj->addUser($fname,$lname,$passwd,$role)){

 	echo "user addition not successful";
}
 
 else{

	echo "user booking added";
}


?>