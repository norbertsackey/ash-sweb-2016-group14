<!--
@authour :Naa Korkoi Larmie
date 1May,2016
suppliersajaxexample class
-->





<html>
	<head>
		<title>Supplier List</title>
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
			/**
			*callback function for deleteRecord ajax call
			*/
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
			/**
			*makes a AJAX call to server to change status of user
			*/
			function viewSupplierStatus(recordID,obj){
			//write a code to send request to AJAX page
				currentObject=obj;
				var theUrl="suppliersajax.php?cmd=2&us="+recordID;
				$.ajax(theUrl,
					{async:true,complete:viewSupplierStatusComplete}
					);
			
			
			
			}
			function saveName(){
				divStatus.innerHTML="Name saved";
			}
			function editName(obj,id){
				var currentName=obj.innerHTML;
				obj.innerHTML="<input id='txtName' type='text' > <span class='clickspot' onclick='saveName()' >save</span>";
				$("#txtName").val(currentName);	
			}
		</script>
	</head>
	<body>
		<div class="status" id="divStatus">Ready</div> 
<!--
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
-->
	</body>
</html>
	
