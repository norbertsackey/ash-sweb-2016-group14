<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class users extends adb{
	function Equipment(){
		
	}

	/**
	* this method adds a new user
	*@param string username login name
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param string usergroup group id
	*@param int permission permission as an int
	*@param int status status of the user account
	*@return boolean returns true if successful or false 
	*/
	function addUser($userID,$firstname,$lastname,$password,$role){
		$strQuery="insert into users set
						userID='$username',
						firstname='$firstname',
						lastname='$lastname',
						password=MD5('$password'),
						role=$status";
		return $this->query($strQuery);				
	}

	

}
?>