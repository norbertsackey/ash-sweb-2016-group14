<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Suppliers List</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="jquery-2.1.3.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  <script>

    function sendRequest(u){
           
                var obj=$.ajax({url:u,async:false});
              
                var result=$.parseJSON(obj.responseText);
                return result;
                
            }


//    function liveSearch() {
// 
//      var str = $("#search" ).val();
//      var obj = sendRequest("Bookingcontroller.php?cmd=2&txtSearch="+str);
//        if(obj.result == 1){
//            displayTasks(obj);
//        }else if(obj.result == 0){
//            $('#divStatus').text(obj.result);
//        }
//    }
//    

/*$( "#search" ).keyup(function() {
 liveSearch();
});
*/
// document.getElementById("search").addEventListener("keyup", liveSearch());



     function displayTasks(obj){
    
    var i = 0;
  
   var table ="<div id = 'btable'>";
    table +="<table class = 'striped highlight'>";
   table +="<tr><td>Supplier ID</td><td>Supplier Name</td><td>Supplier Phone</td><td>Supplier Email</td></tr>";
        for(; i < obj.suppliers.length; i++){
            
            table += "<tr>";
            table += "<td>"+ obj.suppliers[i].Supplier_Id +"</td>";
            table += "<td>"+ obj.suppliers[i].Supplier_Name +"</td>";
            table += "<td>"+ obj.suppliers[i].Supplier_Phone +"</td>";
            table += "<td>"+ obj.suppliers[i].Supplier_Email+"</td>";
//            table += "<td><a href=suppliersajax.php?Supplier_Id="+obj.Supplier_Id+"&cmd=Unreserve &Booking_Id="+obj.Booking_Id+">Unreserve<a></td>";
            table +="</tr>";
            
        } 
        table += "</table>";          
        table += "</div>";       
        $('#btable').html(table);
        $('#btable').show();
       
    }
  </script>

 
</head>
<body>
<!--
<ul id="dropdown1" class="dropdown-content">
  <li><a href="addlab.php">add</a></li>
  <li><a href="#!">edit</a></li>
  <li class="divider"></li>
  <li><a href="#!">delete</a></li>
</ul>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="" class="brand-logo">Ashesi</a>
      <ul class="right hide-on-med-and-down">
         <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Equipment<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Labs<i class="material-icons right">arrow_drop_down</i></a></li>
           <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Suppliers<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a href="#!" >Bookings</a></li>
             <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Users<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul> 
-->
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Ashesi Lab Inventory</h1>
      <div class="row center">
        <h5 class="header col s12 light">Welcome to Ashesi University platform for managing the school labs and equipment</h5>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">
      <div class="row">
<!--
   <form action="suppliersview.php" method="GET">
        <div class="input-field">
          <input name="txtSearch" id="search" type="text" onkeyup="liveSearch()">
          <label for="search"><i class="material-icons">search</i></label>
          <input class="waves-effect waves-light btn" type="submit" value="search">
        </div>
      </form>
-->
      <br>
      <div>

      </div>
          
          <?php         
          if(isset($_REQUEST['us']) && ($_REQUEST['name']) && ($_REQUEST['phone'])&&($_REQUEST['email']))
        {
//              echo $_REQUEST['name'];
          ?>
          <form action="suppliersajax.php" method ="get">
              <input type="text"  value="1" name="cmd" >
              <input type="text" value="<?php echo $_REQUEST['us'] ?>" name="us">
          Supplier Name:<input type="text" placeholder="<?php echo $_REQUEST['name'] ?>" name="name">
         Supplier Phone:<input type="text" placeholder="<?php echo $_REQUEST['phone'] ?>" name="phone">
        Supplier Email:<input type="text" placeholder="<?php echo $_REQUEST['email'] ?>" name="email">
        <input type="submit" name="submit" value = "submit">
          
          </form>
          <?php
          }
          else
          {
              echo"nothing passed";
          }
              ?>
          
          
          
<?php
//  include_once("suppliers.php");
//  $obj = new suppliers();
//
//
//  if(isset($_REQUEST['txtSearch'])){
//    $search_txt = $_REQUEST['txtSearch'];
//     if(!$obj->updateSupplier($search_txt)){
//      echo "Error searching for Equipment";
//     }
//  }
//  else{
//      if(!$obj->getAllSuppliers()){
//      echo "Error getting Equipment";
//     }
//  }

   // if(!$obj->getBookings()){
   //    echo "Error getting Equipment";
   //  }

//    $row=$obj->fetch(); 
//    echo "<div id = 'btable'>";
//    echo "<table class = 'striped highlight'>";
//    echo "<tr><td>Supplier ID</td><td> Supplier Name </td><td>Supplier Phone</td><td>Supplier Email</td></tr>";
//     $i=0;
//   while($row){
//       
//      echo "<tr>";
//      echo "<td>{$row['Supplier_Id']}</td> ";
//      echo "<td>{$row['Supplier_Name']}</td>";
//      echo "<td>{$row['Supplier_Phone']}</td>";
//      echo "<td>{$row['Supplier_Email']}</td>";
//       echo "<td><a href ='suppliersajax.php?cmd=1&us={$row['Supplier_Id']}&name={$row['Supplier_Name']}&phone={$row['Supplier_Phone']}&email={$row['Supplier_Email']}'> Edit</a></td>";
//       echo "<td><a href=suppliersajaxexample.php?Equip_Id="."{$row['Equip_Id']}"."&cmd=1&Booking_Id={$row['Booking_Id']}".">Unbook<a></td>";
//      echo "</tr>";
//      $row= $obj->fetch();
//      $i++;
//
//   } 
//   echo "</table>";
//   echo "</div>";
  ?> 
          
          
          
          
 
   </div>
  </div>
  </div>
  <br><br> 

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Ashesi University College</h5>
          <p class="grey-text text-lighten-4">Ashesi is a private, non-profit liberal arts university located in Ghana, West Africa.</p>
        </div> 
 <div class="col l3 s12">
          <h5 class="white-text">About ALR</h5>
           <p class="grey-text text-lighten-4"> The Ashesi Lab repository is an enabling platform for access/managing lab equipment </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contact Us</h5>
            <p class="grey-text text-lighten-4">1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana</p>
            <p class="grey-text text-lighten-4">Phone: +233.302.610.330</p> 
        </div>

      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2015 Copyright <a class="orange-text text-lighten-3" href="ashesi.edu.gh">Ashesi University College</a>
      </div>
    </div>
  </footer> 

  </body>
</html>
