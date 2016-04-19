<html>
	<head>
		<title>User List</title>
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
			/**
			*callback function for deleteRecord ajax call
			*/
			function deleteRecordComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="error while deleteing a page";
					return;
				}
				divStatus.innerHTML=xhr.responseText;
				//wirte a code to delete the row from the HTML table
				
				
				
				
			}
			/**
			*makes an AJAX call to the server
			*/
			
			function deleteRecord(recordID){
				var ajaxPageUrl="usersajax.php?cmd=1&uc="+recordID;
				$.ajax(ajaxPageUrl,
							{
								async:true,
								complete:deleteRecordComplete,	
							}	
						);
				}
			var currentObject=null;
			/**
			* callback function for changeUserStatus method	
			*/
			function changeUserStatusComplete(xhr,status){
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
			function changeUserStatus(recordID,obj){
			//write a code to send request to AJAX page
				currentObject=obj;
				var theUrl="usersajax.php?cmd=2&uc="+recordID;
				$.ajax(theUrl,
					{
						async:true,
						complete:changeUserStatusComplete
					}
				);
			}

			/**
			* callback function for  method	
			*/
			function saveNameComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="error sending request";
					return;
				}
				
				var obj=$.parseJSON(xhr.responseText);
				if(obj.result==0){
					divStatus.innerHTML=obj.message;	
				}
				else{
					
					divStatus.innerHTML="status changed";
						
				}
				
				currentObject=null;
			}

			function saveName($usercode){
				divStatus.innerHTML=document.getElementById('txtName').value;
				var ajaxPageUrl = "usersajax.php?cmd=5&txtName=$txtName&uc"+ usercode;
				$.ajax(ajaxPageUrl,
						{
							async: true,
							complete: saveNameComplete,
						}
					);
			}

			currentObject = null;



			function editName(obj,id){
				var currentName=obj.innerHTML;
				obj.innerHTML="<input id='txtName' type='text' > <span class='clickspot' onclick='saveName("+id+")' >save</span>";
				$("#txtName").val(currentName);	
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
	
