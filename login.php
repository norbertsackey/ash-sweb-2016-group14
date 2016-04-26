<?php

// Establish Connection
if (isset($_REQUEST['username'])) {
	include_once('adb.php');

	class users extends adb{


		function users(){

		}

		function getUserLogin($username) {

			$sql = "SELECT User_Id, User_Name, User_Pword, Firstname, Lastname FROM users WHERE User_Name = '$username'";

			$row = false;

			if ($this->query($sql)) {
				$row = $this->fetch();
			}

			return $row;
		}
	}
	

	// Initialize variables
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

	$userClass = new users();

	echo "the username is ".$username." and the password is ".$password."\n";

	$result = $userClass->getUserLogin($username);

	if ($result == false){
		echo "User does not exist";
		exit();
	} else {
		if ($result['User_Pword'] == $password){
			session_start();

			echo "about to set the id ".$result['User_Id'];

			$_SESSION['User_Id'] = $result['User_Id'];
			$_SESSION['fname'] = $result['Firstname'];
			$_SESSION['lname'] = $result['Lastname'];
			$_SESSION['username'] = $result['User_Name'];
			header("location: home.php");
		} else {
			echo "Incorrect Password";
			exit();
		}
	}


}

?>

<!DOCTYPE html>
<html>
<html lang="en">
	<head>
		<title> Login </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>

<!-- B O D Y -->
<body background="images/ashesi2.jpeg">
	<div id="main-content">
	
		<!-- L O G I N  B O X -->
		<div class="login-signup-box">

			<!-- W E L C O M E -->
			<div class="welcome">
				<!-- A S H E S I  L O G O -->
				<div id="im">
					<img class="img" src="images/ashesi.jpeg" alt="ashesi">
				</div>

				<!-- W E L C O M E  H E A D I N G -->
				<div class="welcome-heading">
					<h2> W E L C O M E</h2>
				</div>
				
				<div class="welcome-text">
					<p> <b> Lorem ipsum dolor sit amet, no case dicant graeci pro, graeco vituperatoribus nam ut. Alterum accumsan vituperatoribus te his, nobis abhorreant ut mea, nec corpora phaedrum eu. Lorem ipsum dolor sit amet, no case dicant graeci pro, graeco vituperatoribus nam ut. Alterum accumsan vituperatoribus te his, nobis abhorreant ut mea, nec corpora phaedrum eu. </b> </p>
				</div>

			</div>

			<!-- L O G I N -->
			<div class="login-or-signup-main">
				<!-- Top Half -->
				<div class="top">
				</div>

				<!-- Middle -->
				<div class="login-or-signup">
					<div class="login-signup-heading">
						<h2> Login </h2>
					</div>

					<!-- username-password -->
					<div class="username-password">
						<form id="form" method="POST">
							  <input id="username" type="text" placeholder="Username" name="username">
							  <br><br>
							  <input id="password" type="password" placeholder="Password" name="password">

							  <br> <br>

							<br> <br>

							  <div>
							  	 <input type="submit" value="Login" name="Login">
							  </div>

							  <br>
							  <p> Forgot your password? <a href=""> Click Here</p> </p>
						</form>
					</div>
				</div>

				<!-- Bottom half -->
				<div class="bottom">

				</div>

			</div>

		</div>
	</div>

</body>

</html>
