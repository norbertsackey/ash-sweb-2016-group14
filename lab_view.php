<html>
<head>
<title>Index</title>

<link rel="stylesheet" href="css/s.css" >
 
</head>

<!-- <div class = "center">
<div class = "rh">
<a  href="#"><b>Login</b></a>

</div> -->
<body>
<head>
<img style="position:left; top: -1%; left:22%; margin: 25px -25px -25px 25px;" src="Ashesi.jpg" width="100" />

<!-- <p style = "text-align:center; font-size: 30px"><b>Ashesi University College<b></p> -->
<p style = "text-align:center ; font-size: 25px"><b>Lab Management System<b></p>
<nav>

<ul>
<li><a href="home.php">Home</a></li>
<li><a href="laboratories.php">Laboratories</a></li>
<li><a href="manufacturers.php">Equipment</a></li>
<li><a href="students.php">Suppliers</a></li>
</ul>

</nav>
</head>
</div>

<div class = "center1" style="text-align:center" >
<br><ul class = 'm'>
<li><a href = 'addlab.php'>Labs Home Page </a></li>
<li><a href = 'lab_view.php'>View Labs</a></li><br>
</div>
<div class= "center2">
      <script type="text/javascript" src="jquery-2.1.3.js"></script>
      <script>
      function sendRequest (u){
        var obj=$.ajax({url:u,async:false});
        var result=$.parseJSON(obj.responseText);
        return result;
      }
      /**
      * callback function for changeUserStatus method 
      */
      function labStatusComplete(xhr,status){
        if(status!="success"){
          divStatus.innerHTML="error sending request";
          return;
        }
        
        var obj=$.parseJSON(xhr.responseText);
        if(obj.result==0){
          divStatus.innerHTML=obj.message;  
        }else{
          
          divStatus.innerHTML="status changed";
            
        }
        
        currentObject=null;
      
      }
      /**
      *makes a AJAX call to server to change status of user
      */
      function labStatus(id){
      //write a code to send request to AJAX page
        currentObject=obj;
        var theUrl="labAjax.php?cmd=2&changeStatus="+id;
        $.ajax(theUrl,
          {async:true,complete:userStatusComplete}
          );  
      
      }
    </script>
  </head>
  <body>
    <div class="center1" id="divStatus">Lab Details</div> 
 <!--    <table class='reportTable' id="tableLabs" > -->
   <!--  <tr class='header'>
        <td>Lab Id</td>
        <td>Lab Name</td>
        <td>Lab Type</td>
        <td></td>
      </tr>
      <tr class='$style' width='100%'> -->
       <!--  <td>1</td> -->
   <!--      <td ondblclick="editName(this,1)">100</td> -->
        <!-- <td>Physics</td>
        <td>Engineering</td>
        <td>
        </td>
      </tr> -->
      <?php

include_once("labs.php");
$mysqli = new mysqli('localhost','ashesics_amm4002','89lgfy3a9glf','ashesics_margaret_ayodele');
//chekcs if connection has been established 
 if($mysqli->connect_errno){
  echo "Error connecting to database!";
 }
$obj=new labs();
$text="";
if(isset($_REQUEST['txtSearch'])){
$text=$_REQUEST['txtSearch'];
}
$obj->search_labs($text);
echo "<table border='1'>";
echo "<tr style='background-color:olive; color:white; text-align:center'>
<td>Lab ID</td>
<td>Lab Name</td>
<td>Details </td>
</tr>";
              
$row=$obj->fetch();
$style="";
$i=0;
while($row){
if($i%2==0){
$style="style='background-color:Khaki'";
}else{
$style="";
}
echo "<tr $style >";
echo "<td><span class='clickspot' onclick='getDesc({$row['Lab_Id']})'>
{$row['Lab_Name']}<span></td>";
echo "<td>{$row['Lab_Type']}</td>";
// echo "<td>{$row['equipment_id']}</td>";
// echo "<td>{$row['price']}</td>";
echo "<td><a href='labAjax.php'>edit</a> <a href='labAjax.php'>delete</a></td>";
echo "</tr>";
$row=$obj->fetch();
$i++;
}

if(isset($_REQUEST['Lab_Name'])){
  echo $_REQUEST ['Lab_Name'];

    $obj = new labs();
  $equipment_name=$_REQUEST['Lab_Name'];

    if(!$obj->delete_lab($lab_name)){

  echo "Error deleting".mysql_error();
  }
  else
  {
  header("location:labAjax.php");
  }
  }
  ?> 
    </table>
  </body>
</html>
