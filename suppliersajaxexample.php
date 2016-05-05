

<!--
//@authour :Naa Korkoi Larmie
//date 1May,2016
//suppliersajaxexample class
-->


<!DOCTYPE html>
</html>
	<head>
		<title>Supplier List</title>
		 <link rel="stylesheet" href="css/style.css">
		<script src="text/javascript" src="js/jquery-2.1.3.js"></script>
        <script src="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript">
            
          
               function sendRequest(u){
                var obj=$.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
            }
            
            
			function updateRecordComplete(xhr,status){
				if(status!="success"){
				divStatus.innerHTML="error while updating a page";
					return;
				}
				divStatus.innerHTML=xhr.responseText;
				//wirte a code to delete the row from the HTML table	
			}
			/**
			*makes an AJAX call to the server
			*/
			
			function UpdateRecord(SupplierID){
				var ajaxPageUrl="suppliersajax.php?cmd=1&us="+SupplierID;
				$.ajax(ajaxPageUrl,
{async:true,complete:UpdateRecordComplete}	
				);
			}
			var currentObject=null;
			/**
			* callback function for changeUserStatus method	
			*/
			function addSupplierComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="error sending request";
					return;
				}
				
				var obj=$.parseJSON(xhr.responseText);
				if(obj.result==0){
					divStatus.innerHTML=obj.message;	
				}else{
					
					divStatus.innerHTML="supplier added";
						
				}
				
				currentObject=null;
			
			
			
			
			}
            
            function viewSuppliers(){
                echo "trueeeeeeeeeeeeeeeeeee taaaaaaaaaaaaaaaaaaaaaaaaalk";
var notUrl="web/lab_inventory/suppliersajax.php?cmd=3";
                var obj=sendRequest(notUrl);
                if(obj.result==0){
                    
                }
                if(obj.result==1){
                    var table=document.getElementById("t1");
                    var row1=table.insertRow(0);
                    var cell=row1.insertCell(0);
                    cell.innerHTML="Supplier_Id";
                    
                    
                    var cell=row1.insertCell(1);
                    cell.innerHTML = "Supplier_Name";
                    
                    var cell=row1.insertCell(2);
                    cell.innerHTML = "Supplier_Phone";
                    
                    var cell=row1.insertCell(3);
                    cell.innerHTML = "Supplier_Email";
                    
                    
                    for (var count=0; count<obj.message.length; count++)
                    {
                        var row1=table.insertRow(count+1);
                        var cell=row1.insertCell(0);
                        cell.innerHTML=obj.message[count].Supplier_Id;
                                                
                var cell=row1.insertCell(1);
                cell.innerHTML=obj.message[count].Supplier_Name;
                        
                var cell=row1.insertCell(2);
                cell.innerHTML=obj.message[count].Supplier_Phone;
                        
                 var cell=row1.insertCell(3);
                cell.innerHTML=obj.message[count].Supplier_Email; 
                    }
                    
                }
            }         
            
//            
//<body>
//		<div class="status" id="divStatus">Ready</div> 
//		<table class='reportTable' id="tableUsers"  border='1'>
//            
//    <tr><td>Supplier Id</td><td>Supplier Name</td><td>Phone Number</td><td>Email</td></tr>";
//    </body>
       

        </head>
    </script>
</html>
