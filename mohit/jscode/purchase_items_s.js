function phappycode(){


var tot = 0;
var j = document.form2.totalcnt.value;





for (var i=1; i<=j; i++)
  {
    


 var val1 = eval("document.form2.price"+i+".value");
  var val2 = eval("document.form2.qty"+i+".value");
  


  var val3 = (Number(val1) * Number(val2))  ;
  
  
  
  
 

 document.form2[ "total" + i ].value = val3;
 tot = Number(tot) + Number(val3);
 
 
 document.form2.alltotal.value = tot;
 document.form2.ptotal.value = tot; 
  }

}


function shappycode11() {
	  document.form2.additembtn.focus();



}


function addRow(tableID)
    {
	


        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
					
			
        var row = table.insertRow(rowCount);
		
		var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "text";
		element1.size = "5";
		element1.value = "1" ;
        element1.name="itemid"+rowCount;
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
		element4.value = "";
		element4.size = "50";
        element4.name="itemname"+rowCount;
		element4.tabIndex = "3"
		element4.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
        cell4.appendChild(element4);
		
			var cell8 = row.insertCell(4);
        var element8 = document.createElement("input");
        element8.type = "text";
		element8.value = "KG" ;
		element8.size = "8";
		element8.tabIndex = "3"
		element8.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
		element8.name="itemunit"+rowCount;
        cell8.appendChild(element8);
		
		

		
				var cell7 = row.insertCell(5);
        var element7 = document.createElement("input");
        element7.type = "text";
		element7.value = "";
		element7.size = "5";
        element7.name="qty"+rowCount;
		element7.tabIndex = "3"
		element7.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
		element7.setAttribute("onkeyup", "phappycode()");
        cell7.appendChild(element7);
		
		     var cell6 = row.insertCell(6);
        var element6 = document.createElement("input");
        element6.type = "text";
    	element6.value = "";
		element6.size = "15";
		element6.tabIndex = "3"
        element6.name="price"+rowCount;
	    element6.setAttribute("onkeyup", "phappycode()");
		element6.setAttribute("onKeydown","Javascript: if (event.keyCode==13)  shappycode11();");
	    cell6.appendChild(element6);
		
		
				var cell11 = row.insertCell(7);
        var element11 = document.createElement("input");
        element11.type = "text";
		element11.value = "1" ;
		element11.size = "20";
        element11.name="total"+rowCount;
		element11.setAttribute("onkeyup", "phappycode()");
        cell11.appendChild(element11);
		

			
		
		document.form2.totalcnt.value = rowCount; 
		
        phappycode(); 

	
         document.form2[ "itemname" + rowCount ].focus();


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
		   
		        if (j==0) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemid"+i;}
		       if (j==2) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].value = i;}
				 if (j==3) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemname"+i;}
				  if (j==4) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "price" + i;}
				   if (j==5) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "qty"+i;}
				    if (j==6) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemunit"+ i;}
					  if (j==7) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "total"+i;}
					  
		       
           }
    }
	
  //  input name text updatedin finished 
  
				  
				  
				   				  
        }catch(e) {
            alert(e);
        }
		phappycode() ;
    }
	



function phappycode1(){
document.form2.pbalance.value = document.form2.ptotal.value -  document.form2.ppaid.value
}



