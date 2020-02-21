function shappycode() {

var tot = 0;

var j = document.form2.totalcnt.value;

for (var i=1; i<=j; i++)
  {
  
 var val1 = eval("document.form2.mrp"+i+".value");  
  var val2 = eval("document.form2.qty"+i+".value");
  
  var val3 = eval("document.form2.ttotaldis"+i+".value");
  
    var disparv = eval("document.form2.dispr"+i+".value");
  
  var mrpf = Number(val1)  - Number(val3) - ((val1*disparv)/100);
    

   
 

 var f_price = val1 - val3;
 

 var f_price1 = f_price*disparv/100;
 
 
 


  var f_netdis = Number(val3) + Number(f_price1);
  
 
  
  
    var f_Sell_p = (val1 - f_netdis).toFixed(2);
	
	 
  
  
  document.form2[ "dissmount" + i ].value = f_price1;
  
    document.form2[ "sprice" + i ].value = f_Sell_p;
   document.form2[ "disprice" + i ].value = f_netdis;
   
   
     var val4 = ((Number(f_Sell_p) * Number(val2))) ;
   
 document.form2[ "ttotal" + i ].value = val2*f_Sell_p;
	
  tot = Number(tot) + Number(val4);
  
  tot = tot.toFixed(2);
 
 document.form2.netpay.value = tot;

  
  }
  
  

  

}




   	

   function addRow(tableID,itemid,itemname,itemunit)
    {

	

        var table = document.getElementById(tableID);
		

        var rowCount = table.rows.length;
		
				
			
        var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
       element1.type = "text";
	  element1.size = "2";
		element1.value = itemid ;
        element1.name="itemid"+rowCount;
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
	  element4.size = "20";
			element4.value = itemname;
        element4.name="nitemname"+rowCount;
		element4.setAttribute("readonly","0");
        cell4.appendChild(element4);
		
				        var cell4 = row.insertCell(4);
        var element4 = document.createElement("input");
       element4.type = "text";
	  element4.size = "8";
			element4.value = "";
        element4.name="nqty"+rowCount;
		element4.tabIndex = "4";
        cell4.appendChild(element4);
		
	   
		        var cell4 = row.insertCell(5);
        var element4 = document.createElement("input");
       element4.type = "text";
	  element4.size = "8";
		element4.value = itemunit;
		element4.readOnly = true;
        element4.name="itemunit"+rowCount;
        cell4.appendChild(element4);
		

     		
		document.form2.totalcnt.value = rowCount; 
       // shappycode(); 

    }


	
	//  edit  value   start
	
	
	
	  function addRow_u(tableID,itemid_u,itemname_u,itemunit_u,itemqty_u)
    {

	

        var table = document.getElementById(tableID);
		

        var rowCount = table.rows.length;
		
				
			
        var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
       element1.type = "text";
	  element1.size = "2";
		element1.value = itemid_u ;
        element1.name="itemid"+rowCount;
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
	  element4.size = "20";
			element4.value = itemname_u;
        element4.name="nitemname"+rowCount;
		element4.setAttribute("readonly","0");
        cell4.appendChild(element4);
		
				        var cell4 = row.insertCell(4);
        var element4 = document.createElement("input");
       element4.type = "text";
	  element4.size = "8";
			element4.value = itemqty_u;
        element4.name="nqty"+rowCount;
		element4.tabIndex = "4";
        cell4.appendChild(element4);
		
	   
		        var cell4 = row.insertCell(5);
        var element4 = document.createElement("input");
       element4.type = "text";
	  element4.size = "8";
		element4.value = itemunit_u;
		element4.readOnly = true;
        element4.name="itemunit"+rowCount;
        cell4.appendChild(element4);
		

     		
		document.form2.totalcnt.value = rowCount; 
       // shappycode(); 

    }


	
	
	
	//  edit value end 
	
	

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
		   
		        if (j==0) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemid"+i;}
		       if (j==2) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].value = i;}
				 if (j==3) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "nitemname"+i;}
				  if (j==4) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "nqty" + i;}
				    if (j==5) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemunit"+ i;}
				  
		       
           }
    }
	
  //  input name text updatedin finished 
  
				  
				  
				   				  
        }catch(e) {
            alert(e);
        }
		shappycode() ;
    }
	




