<!--
@authour :Naa Korkoi Larmie
date 1May,2016
suppliers class
-->



<?php

include_once("Equipment.php");


class suppliers extends dbconnection{
function suppliers(){
dbconnection::dbconnection();
}
    
    function getSupplier($sid){
        $query="select * from suppliers where Supplier_ID like '%$sid%'";
        return $this->query($query);
        
    }
    
    function geTAllSuppliers(){
        $query="select Supplier_Id, Supplier_Name, Supplier_Phone, Supplier_ Email from suppliers";
        return $this->query($query);
    }
    
    
    function getSupplierBySupplierName($name){
$query="select * from suppliers where Supplier_Name='$name'";
    return $this->query($query);
    }
    
    
    function addSupplier($sid, $name, $phone, $email){
$query="insert into suppliers (Supplier_Id, Supplier_Name, Supplier_Phone,Supplier_Email) values ('$sid','$name','$phone','$email')";
        return $this->query($query);
    }
    
    
    
    function updateSupplier ($sid){
$query="update suppliers set Supplier_Name='$name', Supplier_Phone='$phone', Supplier_Email='$email' where Supplier_Id like '$sid'";
    return $this->query($query);
    }
    
//    function deleteSupplier(){
//        $query="";
//        return $this->query($query);
//    }
}







?>