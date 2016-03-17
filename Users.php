<?php
/**
*/
include_once("adb.php");

/**
*Users  class
*/
class users extends adb {
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchUsers($text=false){
		$filter=false;
		if($text!=false){
			$filter=" USERNAME like '%$text%' or FIRSTNAME like '%$text%' or LASTNAME like '%$text%' ";
		}
		
		return $this->getUsers($filter);
	}

	/*
	*search for tool
	*
	*/
	function searchTool()

	/*
	*search for the user by usergroup
	*@param $text, the text used to search the database for similar text
	*/
	function searchUserGroup($text=false) {
		$filter=false;
		if($text!=false) {
			$filter = ("USERGROUP LIKE '$text'");
		}
		
		return $this->getUsers($filter);
	}

	/*
	* Searches the user's group
	*/
	function searchingUserGroup($text=false, $usergroup=false) {
		$filter=false;
		if($text!=false && $usergroup!=false) {
			$filter = ("FIRSTNAME LIKE '%$text%' or USERNAME LIKE '%text%') and USERGROUP=$usergroup");
		}

		else if($text !=false and $usergroup==false) {
			$filter = "FIRSTNAME LIKE '%$text%' or USERNAME LIKE '%text%'";
		}

		else {
			$filter = "USERGROUP='$usergroup'";
		}
		
		return $this->getUsers($filter);
	}
}
?>