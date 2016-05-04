<!--/**
   * @author Benedicta Amo Bempah
   * @copyright 2016
   ** description: The display class tests the user class to see if functions are working well. 
   This class communicates with DB but maily the users.php
   */ 
-->
<html>
<head>
    <title>Display Users</title>
      <link rel="stylesheet" href="display.css">
      <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
      <script type="text/javascript" src="jquery-2.1.3.js"></script>
      
</head> 
<body>
<?php
		/**
		*Include the view_equipment class and use an instance of it to display equipment information
		*/
	include_once("users.php");
	
		$obj = new users();
		$obj->getUsers();		
		$row = $obj->fetch();
		if (!$row){
			echo "Unavailable data";
		}
		else{
		
			echo ("<table class='table table-condensed table-hover table-bordered'>");
			echo("<tr><th>Student ID</th>
				  <th>Firstname</th>
				  <th>Lastname</th> "); 
					
			while ($row) {
			
									
				echo "<tr>";

		
				echo "<td>{$row['Student_ID']}</td>";
				
				echo "<td>{$row['First_name']}</td>";
				
				echo "<td>{$row['Last_name']}</td>";

				echo "</tr>";
				$row = $obj->fetch();
			
		}
	}

			echo ("</table>");
		
?>
</body> 
</html>
