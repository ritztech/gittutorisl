
 

<HTML>
<HEAD>
<TITLE> Add/Remove dynamic rows in HTML table </TITLE>

<SCRIPT language="javascript">


   function happycode()
   {
   
   alert("ok");
   
   }


    function addRow(tableID)
    {


        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
		
				

        var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "checkbox";
        cell1.appendChild(element1);


      //  var cell2 = row.insertCell(1);
       // cell2.innerHTML = rowCount ;

	   
	      var cell2 = row.insertCell(1);
        var element1 = document.createElement("input");
        element1.type = "text";
		 element1.size = "5";
		element1.value = rowCount ;
        element1.name="Sno"+rowCount;
        cell2.appendChild(element1);
	   
	   
	   
        var cell3 = row.insertCell(2);
        var element2 = document.createElement("input");
        element2.type = "text";
		element2.value = "50" ;
		element2.setAttribute("onChange", "happycode()");
		
		element2.name="Quantity"+rowCount;
		
        cell3.appendChild(element2);


        var cell4 = row.insertCell(3);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.value = "some description" ;
        element3.name="Description" + rowCount;  
        cell4.appendChild(element3);

        var cell5 = row.insertCell(4);
        var element4 = document.createElement("input");
        element4.type = "text";
		element4.value = "some amount" ;
        element4.name="Amount"+rowCount;
        cell5.appendChild(element4);
		
		
		

		  document.form2.alltotal.value = rowCount; 
        
    }

    function deleteRow(tableID)
    {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
				
			         
				
				   if(null != chkbox && true == chkbox.checked) {
				   
			              table.deleteRow(i);
                    rowCount--;
					i--;
                }
            }
			
	
			
			
		 document.form2.alltotal.value = rowCount - 1 ; 
		 
		 
		 
  //  input name text updatedin start 
  
 var oTable = document.getElementById(tableID);
 var rowLength = oTable.rows.length;
  for (i = 1; i < rowLength  ; i++){
    var oCells = oTable.rows.item(i).cells;
    var cellLength = oCells.length;
           for(var j = 1; j < cellLength; j++){
		   
		        if (j==1)
				{
				document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].value = i;
				
				}
		   
		   
		          if (j==2)
				{
				document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "Quantity" + i;
				
				
				}
				
				  if (j==3)
				{
				document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "Description" + i;
				
								
				}
				
				  if (j==4)
				{
				document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "Amount" +  i;
				
			   
				}
				
		   
		   
               
               
           }
    }
	
  //  input name text updatedin finished 
  
				  
				  
				   				  
        }catch(e) {
            alert(e);
        }
    }

</SCRIPT>


</head>


<form name = "form2" method="post" action="data_grid_output.php" name="t1">

<INPUT type="button" value="Add Row" onclick=addRow('dataTable') />
<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />

</br>
</br>
<input type = "text" size="4"  onChange="happycode()"   name = "qtyddd" value=1 />
</br>

<TABLE id="dataTable" width="350px" border="1">

    <tr>
        <th>Check</th>    <th>SNO</th>  <th>Quantity</th>  <th>Description</th> <th>Amount</th>
		
    </tr>




    </TABLE>
	
</br>
</br>
	
<input type = "text"  width="30" name = "alltotal" id = "alltotal" value="0" /> 

</br>

	
<INPUT type="submit"  name="submit" value="Send"/>

</form>
</body>
</html>
