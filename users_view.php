<html>
  <head>
    <title>View Users</title>
      <link rel="stylesheet" href="css/style.css">
      <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
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
      function userStatusComplete(xhr,status){
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
      function userStatus(id){
      //write a code to send request to AJAX page
        currentObject=obj;
        var theUrl="userAjax.php?cmd=2&changeStatus="+id;
        $.ajax(theUrl,
          {async:true,complete:userStatusComplete}
          );  
      
      }
    </script>
  </head>
  <body>
    <div class="status" id="divStatus">Ready</div> 
    <table class='reportTable' id="tableUsers" >
    <tr class='header'>
        <td>Code</td>
        <td>User Name</td>
        <td>Full Name</td>
        <td>Group</td>
        <td></td>
      </tr>
      <tr class='$style' width='100%'>
        <td>1</td>
        <td ondblclick="editName(this,1)">adafla</td>
        <td>Dafla,Aelaf</td>
        <td>Faculty</td>
        <td>
        </td>
      </tr>
    </table>
  </body>
</html>
  
