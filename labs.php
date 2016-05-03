<?php
include("adb.php");

class labs extends adb{


	 //functions to add,search and delete 

	function search_labs($text){
		$str_query="select * from labs 
				where Lab_Name like '%$text%'";
		
		return $this->query($str_query);
	
	}
	
	function add_lab($lab_id,$lab_name,$lab_type){
		$str_query="insert into labs set
                    Lab_Id='$lab_id', Lab_Name='$lab_name',Lab_Type='$lab_type'";

                      return $this->query($str_query);
	}

	function delete_lab($lab_name){
			$str_query="delete from labs where Lab_Name='$lab_name'";	

			 return $this->query($str_query);	 
		}
	}
?>