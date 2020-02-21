  	

   function addRow(tableID,drugitrmno,drugdesc,barcode)
    {

	

        var table = document.getElementById(tableID);
		

        var rowCount = table.rows.length;
		
				
			
        var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
       element1.type = "text";
	  element1.size = "2";
		element1.value = drugitrmno ;
        element1.name="mastitem"+rowCount;
	    element1.setAttribute("class", "noPrint");
		
        cell1.appendChild(element1);
	   					

						    
							
							
        var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
        element2.type = "checkbox";
        cell2.appendChild(element2);


      //  var cell2 = row.insertCell(1);
       // cell2.innerHTML = rowCount ;

	   
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.size = "3";
		element3.value = rowCount ;
        element3.name="Sno"+rowCount;
        cell3.appendChild(element3);
	   
	   
	   
        var cell4 = row.insertCell(3);
        var element4 = document.createElement("input");
       element4.type = "text";
	  element4.size = "40";
		element4.value = drugdesc;
        element4.name="mastdesc"+rowCount;
        cell4.appendChild(element4);


        var cell5 = row.insertCell(4);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = barcode;
		element5.size = "20";
        element5.name="barcode" + rowCount;  
        cell5.appendChild(element5);

        	
		
		document.form2.totalcnt.value = rowCount; 
       // shappycode(); 

    }



	function deleteRow(tableID)
    {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=1; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[1].childNodes[0];
				
			    				
				      
				
				   if(null != chkbox && true == chkbox.checked) {
				   	
                    table.deleteRow(i);
                    rowCount--;
					
							
                    i--;
                }
            }
			
			
		 document.form2.totalcnt.value = rowCount - 1 ; 
		 
		 
		 
  //  input name text updatedin start 
  
 var oTable = document.getElementById(tableID);
 var rowLength = oTable.rows.length;
  for (i = 1; i < rowLength  ; i++){
    var oCells = oTable.rows.item(i).cells;
    var cellLength = oCells.length;
           for(var j = 0; j < cellLength; j++){
		   
		        if (j==0) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "mastitem"+i;}
		       if (j==2) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].value = i;}
				 if (j==3) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "mastdesc"+i;}
				  if (j==4) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "mrp" + i;}
				   if (j==5) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "sprice"+i;}
				    if (j==6) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "qty"+ i;}
					 if (j==7) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "ttotaldis"+ i;}
		               if (j==8) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "ttotal"+ i;}
					     if (j==9) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "freeqty"+ i;}

					  
		       
           }
    }
	
  //  input name text updatedin finished 
  
				  
				  
				   				  
        }catch(e) {
            alert(e);
        }
		
    }
	
