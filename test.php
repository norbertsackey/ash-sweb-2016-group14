<?php

define("DB_HOST", 'localhost');
define("DB_NAME", 'lab_inventory2016');
define("DB_PORT", '3306');
define("DB_USER", "root");
define("DB_PASSWORD", "");

$mysqli= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


    if (mysqli_connect_errno()){
     printf("Connection failed: %s\n" .mysqli_connect_error());
    exit();
   }

$str_query="SELECT Student_ID, First_name, Last_name from users";

$info = mysqli_query($mysqli,$str_query);

if($info){
    $ar=array();
    while($row=mysqli_fetch_assoc($info)){
        $ar[]=array('Student_ID'=>$row['Student_ID'],'First_name'=>$row['First_name'],'Last_name'=>$row['Last_name']);
    }
}

$result = array('users'=>$ar);

print_r($result);

?>



<!-- // include_once("users.php");

// $obj=new users();
// $row=$obj->getAllUsers();
// print_r($row);
// echo "your name is"; -->





 --> -->

</body>

    </html>