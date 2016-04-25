<?php

// Establish Connection
if (isset($_REQUEST['User_Name'])) {
	$db = new mysqli("localhost","root","","webtech");

	if($db->connect_errno) {
		echo "Error authenticating connection {$db->connect_errno}";
		exit();
	}

	// Initialize variables
	$userid = $_REQUEST['User_Id'];
	$password = $_REQUEST['User_Pword'];

	// Query
	$sql = "SELECT User_Id FROM users WHERE User_Id = '$userid' and User_Pword = $password";

	$result = $db->query($sql);

	if (!$result) {
		echo "Authentication Error";
		exit();
	}

	$row = $result->fetch_assoc();

	if (!$row) {
		echo "Username or password is wrong";
		exit();
	}

	else {
		session_start();
		$_SESSION['User_Id'] = $row['User_Id'];
		header("location: home.php");
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
						<form id="form" action="home.html">
							  <input id="username" type="text" placeholder="Username" name="username">
							  <br><br>
							  <input id="password" type="password" placeholder="Password" name="password">

							  <br> <br>

							<!-- <select name="usergroup">
								<option value=""> Select Usergroup </option>
								<option value="1"> Admin </option>
								<option value="2"> Student </option>
							</select> -->

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
