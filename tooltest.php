<?php
include_once ("products.php");

 $obj=new equipment();

if(!$obj->equipment()){
echo "error";
}
else{
echo"success";
}
?>
