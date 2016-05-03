<?php
/**
   * @author Benedicta Amo Bempah
   * @copyright 2016
   ** description: A main class to manage all classes. This class communicates with DB
   */ 

include_once("adb.php");
/**
*Creating the Users  class 
*/
class users extends adb{

	function users(){
	}
	/**
	*Adds a new user
	*@param int login student_id
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param set permission permission as an set
	*@param int status shows status of the user account
	*@return boolean returns true if successful or false 
	*/

	function addUser($student_id, $password, $first_name, $last_name, $permission){
		$strQuery="insert into users set
						STUDENT_ID='$student_id',
						PASSWORD=('$password'),
						FIRST_NAME='$first_name',
						LAST_NAME='$last_name',
						PERMISSION=$permission,";
		return $this->query($strQuery);				
	}

    /**
	*Searches for user by student_id, firstname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false 
	*/

	function searchUsers($student_id){
		$strQuery = "SELECT Student_ID, First_name, Last_name from users";
		return $this->query($strQuery);
	}
	
	/**
	*delete student details
	*@param int student_id the student id to be deleted
	*returns true if the student is deleted, else false
	*/

	function deleteUser($student_id){
		$strQuery = "DELETE FROM 'users' WHERE student_id = '$student_id'";
		return $this->query($strQuery);
	}

	/**
	* method to take in any updates by inserting into the database or editing
	* @param int student_id of a user
	* @return boolean true if successful, else false 
	*/

	function updateUser(){
		$strQuery= "UPDATE 'users' SET 
		'student_id'=[''],
		'password'=[''],
		'first_name'=[''],
		'last_name'=[''],
		'status'=[''],
		'permission'=[''] WHERE 1";

		return $this->query($strQuery);
	}

	/**
	* method to change status of user to new user
	* @param int student_id of a user
	* @return boolean true if successful, else false 
	*/
	function userStatus($student_id){
		$strQuery="UPDATE 'users' SET 
		'status'= NewUser where student_id ='$student_id'";
	}

	/**
	* method to change status of user to enabled
	* @param int student_id of a user
	* @return boolean true if successful, else false 
	*/
	function userPermission($student_id){
		$strQuery="UPDATE 'users' SET 
		status= Enabled where student_id ='$student_id'";
	}

	/**
	* method to fetch all user details in the database
	* @return boolean true if successful, else false 
	*/
	
	function getUsers(){
	$strQuery= "select Student_ID, First_name, Last_name from users";
	return $this->query($strQuery);
	}

}

//$obj =new users();
//$row=$obj->getUsers();
//echo ($row);

?>




