<?php
	

		session_start(); // Starting Session
		$error=''; // Variable To Store Error Message
		if (isset($_POST['submit'])) {
		// Define $id and $password
		$admin_id=$_POST['admin_id'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysql_connect("localhost", "root", "");
		if (!$connection) die ("No connection exits");
		// To protect MySQL injection for Security purpose
		$admin_id = stripslashes($admin_id);
		$password = stripslashes($password);
		$admin_id = mysql_real_escape_string($admin_id);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		$db = mysql_select_db("lab_inventory2016", $connection);
		if ($db){
		$rows = 0;
			// SQL query to fetch information of registerd users and finds user match.		
		$query = sprintf("SELECT count(*) as 'num' FROM user 
	    	WHERE admin_id='%s' AND password='%s'", $admin_id,$password);
		$rows = mysql_query($query, $connection);
			

		if (!$rows) {
		    echo "DB Error, could not query the database\n";
		    die ('MySQL Error: ' . mysql_error());
		    exit;
  	 }

  	 
		$rows = mysql_fetch_assoc($rows);
		if ($rows['num'] == 1) {
				$_SESSION['login_admin']=$admin_id; // Initializing Session
				header("location: ../index.php"); // Redirecting To Other Page
		} else {
			$error = ":( admin_id or Password is invalid";
		}
   }else{
			die ("Database not found");
	}

	mysql_close($connection); // Closing Connection
	}
?>