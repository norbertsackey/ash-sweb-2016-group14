<?php
include("adb.php");

class Labs extends adb{


	 //functions to add,search and delete 

	function search_by_name($lab_name){
		$str_query="select * from labs 
				where lab_name like '%$lab_name%'";
		
		return $this->query($str_query);
	
	}
	
	function add_lab($lab_id,$lab_name,$lab_capacity,$lab_location){
		$str_query="insert into labs set
                    lab_id='$lab_id', lab_name='$lab_name',lab_capacity='$lab_capacity',
                     lab_location='$lab_location'";

                      return $this->query($str_query);
	}

	function delete_lab($lab_name){
			$str_query="delete from labs where lab_name='$lab_name'";	

			 return $this->query($str_query);	 
		}
	}
?>