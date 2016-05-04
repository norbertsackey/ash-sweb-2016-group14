<?php
/**
   * @author Benedicta Amo Bempah
   * @copyright 2016
   ** description: This page communicates and connects with DB
   */ 

define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","lab_inventory2016");
$db = mysqli_connect(DB_HOST, DB_USERNAME,DB_PASSWORD,DB_NAME);

?>
