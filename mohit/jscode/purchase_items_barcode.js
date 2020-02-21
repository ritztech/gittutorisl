


function addRow(tableID,drugdesc,mrp,itembarcode,dop,weight_n,sprice,itemid)
    {

	//alert(itemid);
	
		var date = new Date();

  currentDate = date.getDate();     // Get current date
      month       = date.getMonth() + 1; // current month
      year        = date.getFullYear();
 
//alert("current date is " + currentDate + "/" + month + "/" + year);

var n_date = currentDate + "/" + month + "/" + year;


        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
					
			
        var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "text";
		element1.size = "5";
		element1.value = itemid ;
        element1.name="mastitem"+rowCount;
		element1.setAttribute("class", "noPrint");
		cell1.appendChild(element1);
	   						
							
        var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
        element2.type = "checkbox";
        cell2.appendChild(element2);

  
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.size = "5";
		element3.value = rowCount ;
        element3.name="Sno"+rowCount;
        cell3.appendChild(element3);
	   
	   
	   
        var cell4 = row.insertCell(3);
        var element4 = document.createElement("input");
        element4.type = "text";
		element4.size = "50";
		element4.value = drugdesc;
        element4.name="mastdesc"+rowCount;
        cell4.appendChild(element4);
		
			   
        var cell4 = row.insertCell(4);
        var element4 = document.createElement("input");
        element4.type = "text";
		element4.size = "10";
		element4.value = weight_n;
        element4.name="weight"+rowCount;
        cell4.appendChild(element4);
		
		
	

	    var cell9 = row.insertCell(5);
        var element9 = document.createElement("input");
        element9.type = "text";
	    element9.value = itembarcode ;
		element9.size = "20";
		element9.readOnly = true;
        element9.name="barcode"+rowCount;
        cell9.appendChild(element9);


		var cell9 = row.insertCell(6);
        var element9 = document.createElement("input");
        element9.type = "text";
		element9.value = mrp ;
	   	element9.size = "10";
        element9.name="itemsprice"+rowCount;
        cell9.appendChild(element9);
		
		
				var cell9 = row.insertCell(7);
        var element9 = document.createElement("input");
        element9.type = "text";
		element9.value = sprice ;
	   	element9.size = "10";
        element9.name="sellprice"+rowCount;
        cell9.appendChild(element9);
		
		
		
				var cell9 = row.insertCell(8);
        var element9 = document.createElement("input");
        element9.type = "text";
		element9.value = n_date ;
	   	element9.size = "10";
        element9.name="dop"+rowCount;
        cell9.appendChild(element9);
		
		
					var qty1 = prompt("Please enter quantity");
		
		if(qty1 == "")
		{
			qty1 = 1;
		}

		
		var cell9 = row.insertCell(9);
        var element9 = document.createElement("input");
        element9.type = "text";
	   	element9.size = "10";
		element9.value = qty1;
        element9.name="noofitem"+rowCount;
        cell9.appendChild(element9);
		
		
		var cell9 = row.insertCell(10);
        var element9 = document.createElement("input");
        element9.type = "hidden";
	   	element9.size = "10";
		element9.value = 1;
        element9.name="upstatus"+rowCount;
        cell9.appendChild(element9);
		
		
		
		
		document.form2.totalcnt.value = rowCount; 
		
	  //alert('done');
     
    }
	
	
	
	function addRow_upd(tableID,drugdesc,mrp,itembarcode,dop,weight_n,sprice,itemid,qty_ord)
    {

	//alert(itemid);
	
		var date = new Date();

  currentDate = date.getDate();     // Get current date
      month       = date.getMonth() + 1; // current month
      year        = date.getFullYear();
 
//alert("current date is " + currentDate + "/" + month + "/" + year);

var n_date = currentDate + "/" + month + "/" + year;


        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
					
			
        var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "text";
		element1.size = "5";
		element1.value = itemid ;
        element1.name="mastitem"+rowCount;
		element1.setAttribute("class", "noPrint");
		cell1.appendChild(element1);
	   						
							
        var cell2 = row.insertCell(1);
        var element2 = document.createElement("input");
        element2.type = "checkbox";
        cell2.appendChild(element2);

  
	    var cell3 = row.insertCell(2);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.size = "5";
		element3.value = rowCount ;
        element3.name="Sno"+rowCount;
        cell3.appendChild(element3);
	   
	   
	   
        var cell4 = row.insertCell(3);
        var element4 = document.createElement("input");
        element4.type = "text";
		element4.size = "50";
		element4.value = drugdesc;
        element4.name="mastdesc"+rowCount;
        cell4.appendChild(element4);
		
			   
        var cell4 = row.insertCell(4);
        var element4 = document.createElement("input");
        element4.type = "text";
		element4.size = "10";
		element4.value = weight_n;
        element4.name="weight"+rowCount;
        cell4.appendChild(element4);
		
		
	

	    var cell9 = row.insertCell(5);
        var element9 = document.createElement("input");
        element9.type = "text";
	    element9.value = itembarcode ;
		element9.size = "20";
		element9.readOnly = true;
        element9.name="barcode"+rowCount;
        cell9.appendChild(element9);


		var cell9 = row.insertCell(6);
        var element9 = document.createElement("input");
        element9.type = "text";
		element9.value = mrp ;
	   	element9.size = "10";
        element9.name="itemsprice"+rowCount;
        cell9.appendChild(element9);
		
		
				var cell9 = row.insertCell(7);
        var element9 = document.createElement("input");
        element9.type = "text";
		element9.value = sprice ;
	   	element9.size = "10";
        element9.name="sellprice"+rowCount;
        cell9.appendChild(element9);
		
		
		
				var cell9 = row.insertCell(8);
        var element9 = document.createElement("input");
        element9.type = "text";
		element9.value = n_date ;
	   	element9.size = "10";
        element9.name="dop"+rowCount;
        cell9.appendChild(element9);
		
		//alert(qty_ord);
		
		var cell9 = row.insertCell(9);
        var element9 = document.createElement("input");
        element9.type = "text";
	   	element9.size = "10";
		element9.value = qty_ord;
        element9.name="noofitem"+rowCount;
        cell9.appendChild(element9);
		
		
		var cell9 = row.insertCell(10);
        var element9 = document.createElement("input");
        element9.type = "hidden";
	   	element9.size = "10";
		element9.value = 1;
        element9.name="upstatus"+rowCount;
        cell9.appendChild(element9);
		
		
	//	alert(rowCount);
		
		document.form2.totalcnt.value = rowCount; 
		
	  //alert('done');
     
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
				  if (j==4) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "weight" + i;}
				   if (j==5) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "barcode"+i;}
				    if (j==6) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemsprice"+ i;}
					 if (j==7) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "sellprice"+ i;}
					 if (j==8) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "dop"+ i;}
					 if (j==9) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "noofitem"+ i;}
					  if (j==10) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "upstatus"+ i;}
					 

					  
		       
           }
    }
	
  //  input name text updatedin finished 
  
				  
				  
				   				  
        }catch(e) {
            alert(e);
        }
		    }
	






