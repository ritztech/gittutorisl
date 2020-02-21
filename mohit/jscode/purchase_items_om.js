
function shappycode11() {
	  document.form2.mybtn445454.focus();



}


function phappycode(){

var tot = 0;
var j = document.form2.totalcnt.value;

for (var i=1; i<=j; i++)
  {
	  
  
    
  var val1 = eval("document.form2.p_price"+i+".value");
  var val2 = eval("document.form2.qty"+i+".value");


 
  
  var val4 = (Number(val2) * Number(val1))  ;
 document.form2[ "total" + i ].value = val4;
 tot = Number(tot) + Number(val4);
 
 document.form2.alltotal.value = tot;
 document.form2.ptotal.value = tot;


  }

  
}

function getbarcode(str)
{

var b_1 = document.form2.barvalue.value;	
	
document.form2[ "barcode" + str ].value  = b_1;

document.form2.barvalue.value = Number(b_1)+1;


}





function addRow(tableID,itemname,itemcomp,itemcat,prodid_p,sell_p,mrp,batchno,grpid,barcode)
    {
  
  
  
       var t_pos = 0;
		
        var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
					
			
        var row = table.insertRow(rowCount);
		
 		
		var cell1 = row.insertCell(t_pos++);
        var element1 = document.createElement("input");
       element1.type = "hidden";
	  element1.size = "2";
		element1.value = "" ;
        element1.name="mastitem1234"+rowCount;
	    //element1.setAttribute("class", "noPrint");
		cell1.appendChild(element1);
		
			 						
							
        var cell2 = row.insertCell(t_pos++);
        var element2 = document.createElement("input");
        element2.type = "checkbox";
        cell2.appendChild(element2);


	
  
	    var cell3 = row.insertCell(t_pos++);
        var element3 = document.createElement("input");
        element3.type = "text";
		element3.size = "3";
		element3.value = rowCount ;
        element3.name="Sno"+rowCount;
        cell3.appendChild(element3);
	   
	   
	   
        var cell4 = row.insertCell(t_pos++);
        var element4 = document.createElement("input");
        element4.type = "text";
		element4.size = "20";
		 element4.readOnly = true;
		element4.value = itemname;
        element4.name="itemname"+rowCount;
        cell4.appendChild(element4);
		
				
		
		        var cell4 = row.insertCell(t_pos++);
        var element4 = document.createElement("input");
       	element4.type = "hidden";
		element4.size = "8";
		element4.value = itemcomp;
        element4.name="itemcomp"+rowCount;
        cell4.appendChild(element4);
		
				
				
		        var cell4 = row.insertCell(t_pos++);
        var element4 = document.createElement("input");
        element4.type = "text";
		element4.size = "10";
		element4.value = itemcat;
        element4.name="itemcat"+rowCount;
		 element4.readOnly = true;
        cell4.appendChild(element4);
		
				
		
        var cell5 = row.insertCell(t_pos++);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = "1";
		element5.size = "3";
        element5.name="ptype" + rowCount;  
        cell5.appendChild(element5);
		
				
				
		var cell5 = row.insertCell(t_pos++);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = "";
		element5.tabIndex = "6";
		element5.size = "3";
        element5.name="designno" + rowCount;  
        cell5.appendChild(element5);
		
		
	
		
		var cell5 = row.insertCell(t_pos++);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = "";
		element5.size = "5";
		element5.setAttribute("onkeyup", "phappycode()");
		element5.tabIndex = "6";
		element5.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
        element5.name="ssize" + rowCount;  
        cell5.appendChild(element5);
		
		
				
				
				
				var cell5 = row.insertCell(t_pos++);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = "";
		element5.size = "5";
		element5.setAttribute("onkeyup", "phappycode()");
		element5.tabIndex = "6";
		element5.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
        element5.name="esize" + rowCount;  
        cell5.appendChild(element5);
		
		

				
				
		

		var cell5 = row.insertCell(t_pos++);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = "";
		element5.size = "5";
		element5.tabIndex = "6";
				element5.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
        element5.name="mrp" + rowCount;  
        cell5.appendChild(element5);
		
				
		
				
		var cell5 = row.insertCell(t_pos++);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = "";
		element5.size = "3";
		element5.tabIndex = "6";
        element5.name="dispr" + rowCount; 
		element5.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");		
        cell5.appendChild(element5);
		
				
		
				var cell5 = row.insertCell(t_pos++);
        var element5 = document.createElement("input");
        element5.type = "hidden";
		element5.value = "1";
		element5.size = "3";
        element5.name="shortval" + rowCount;  
        cell5.appendChild(element5);
		
				
				

        var cell6 = row.insertCell(t_pos++);
        var element6 = document.createElement("input");
        element6.type = "text";
    	element6.value = "";
		element6.size = "5";
		element6.tabIndex = "6";
        element6.name="p_price"+rowCount;
				element6.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
		element6.setAttribute("onkeyup", "phappycode()");
        cell6.appendChild(element6);
		
				

		var cell7 = row.insertCell(t_pos++);
        var element7 = document.createElement("input");
        element7.type = "text";
		element7.value = "";
		element7.size = "5";
		element7.tabIndex = "6";
        element7.name="qty"+rowCount;
		element7.setAttribute("onkeydown","ModifyEnterKeyPressAsTab(event)");
		element7.setAttribute("onkeyup", "phappycode()");
		element7.setAttribute("onchange", "shappycode11()");
        cell7.appendChild(element7);
		

				
				
				
				       var cell11 = row.insertCell(t_pos++);
        var element11 = document.createElement("input");
        element11.type = "text";
		element11.value = "1";
	    element11.size = "5";
		element11.readOnly = true;
        element11.name="sizediff"+rowCount;
        cell11.appendChild(element11);
		

		
		
		
	
        var cell11 = row.insertCell(t_pos++);
        var element11 = document.createElement("input");
        element11.type = "text";
	    element11.size = "5";
        element11.name="total"+rowCount;
        cell11.appendChild(element11);
		
				
		
	    var cell9 = row.insertCell(t_pos++);
        var element9 = document.createElement("input");
        element9.type = "text";
	    element9.value = "" ;
		element9.size = "10";
        element9.name="barcode"+rowCount;
        cell9.appendChild(element9);
		getbarcode(rowCount);
		
			    var cell9 = row.insertCell(t_pos++);
        var element9 = document.createElement("input");
        element9.type = "text";
	    element9.value = prodid_p ;
		element9.size = "4";
        element9.name="prodid"+rowCount;
        cell9.appendChild(element9);
		getbarcode(rowCount);
		
		
				
				
         var cell9 = row.insertCell(t_pos++);
        var element9 = document.createElement("input");
        element9.type = "button";
	    element9.value = "GET BARCODE" ;
		element9.size = "10";
        element9.name="barbtn"+rowCount;
		element9.setAttribute("onclick","getbarcode("+rowCount+")");
        cell9.appendChild(element9);
		
		
					

				
		
		document.form2.totalcnt.value = rowCount; 
      //  phappycode(); 

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
		   
		       
		        if (j==0) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "mastitem1234"+i;}
		       if (j==2) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].value = i;}
				 if (j==3) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemname"+i;}
				  if (j==4) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemcomp" + i;}
				   if (j==5) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "itemcat"+i;}
				   if (j==6) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "ptype"+i;}
				   if (j==7) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "designno"+i;}
				   
				   if (j==8) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('SELECT')[0].name = "item"+i;}
				    if (j==9) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "ssize"+ i;}
					 if (j==10) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "esize"+ i;}
					 if (j==11) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "mrp"+i;}
					  if (j==12) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "dispr"+i;}
					  
						  if (j==13) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "shortval"+i;}
						  
								  
					   if (j==14) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "p_price"+i;}
					    if (j==15) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "qty"+i;}
						 if (j==16) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "sizediff"+i;}
						 if (j==17) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "total"+i;}
						  if (j==18) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "barcode"+i;}
						  if (j==19) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "prodid"+i;}
						   
					  					  
					   if (j==20) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "barbtn"+i;
					   document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].setAttribute("onclick","getbarcode("+i+")");
					   }
					  
		       
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



