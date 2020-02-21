

function shappycode() {





var tot = 0;
var totsav = 0;

var j = document.form2.totalcnt.value;

for (var i=1; i<=j; i++)
  {
  
 var valmrp = eval("document.form2.mrp"+i+".value");  
  var val1 = eval("document.form2.sprice"+i+".value");
  var val2 = eval("document.form2.qty"+i+".value");
  var val4 = ((Number(val1) * Number(val2))) ;
 document.form2[ "ttotal" + i ].value = val4;
 

 
 var val5 = ((Number(valmrp) - Number(val1)) * Number(val2));
 
  var  saving = (Number(valmrp) - Number(val1)) * Number(val2);
   
 
 document.form2[ "ttotaldis" + i ].value = saving.toFixed(2);
 

 
 
 
 
 tot = Number(tot) + Number(val4);
 totsav = Number(totsav) + Number(val5)
 
 
 tot = tot.toFixed(2);
 
 
 
 document.form2.tsaving.value = totsav.toFixed(2);
 document.form2.alltotal.value = tot;
 document.form2.stotal.value = tot; 
  document.form2.netpay.value = tot;
  document.form2.paid.value = tot;


   
//document.form2.paid.value = (Number(cash_t1) + Number(cash_t2) + Number(cash_t3));
 
 
  
  }
  
  shappycode1();
  balancecalc();
  
  
  document.form2.barscan.value = "";
  document.form2.barscan.focus();
  

}


function balduecode() {
	
	var tot = document.form2.netpay.value ; 
	
 var cash_t1 = eval("document.form2.totalcash.value");
var cash_t2 = eval("document.form2.totalcard.value");
var cash_t3 = eval("document.form2.totalsodexo.value");


   
document.form2.balance.value = tot - (Number(cash_t1) + Number(cash_t2) + Number(cash_t3));	
document.form2.paid.value =  (Number(cash_t1) + Number(cash_t2) + Number(cash_t3));

	
	
}


   	

   function addRow(tableID,drugitrmno,drugdesc,sprice,mrp,freeqty,grpid,weight_n,tatypeee)
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
		element3.size = "2";
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
		
		        var cell4 = row.insertCell(4);
        var element4 = document.createElement("input");
       element4.type = "text";
	  element4.size = "10";
		element4.value = weight_n;
        element4.name="weight1"+rowCount;
        cell4.appendChild(element4);
		


        var cell5 = row.insertCell(5);
        var element5 = document.createElement("input");
        element5.type = "text";
		element5.value = mrp;
		element5.size = "3";
        element5.name="mrp" + rowCount;  
        cell5.appendChild(element5);

        var cell6 = row.insertCell(6);
        var element6 = document.createElement("input");
        element6.type = "text";
		element6.value = sprice;
		element6.size = "5";
        element6.name="sprice"+rowCount;
		element6.setAttribute("onchange", "shappycode()");
        cell6.appendChild(element6);
		
	

		var cell7 = row.insertCell(7);
        var element7 = document.createElement("input");
        element7.type = "text";
		element7.value = "1" ;
		element7.size = "3";
		element7.setAttribute("onchange", "shappycode()");
		element7.name="qty"+rowCount;
        cell7.appendChild(element7);
		
		var cell8 = row.insertCell(8);
        var element8 = document.createElement("input");
        element8.type = "text";
	    element8.size = "5";
        element8.name="ttotaldis"+rowCount;
        cell8.appendChild(element8);
		
		

		var cell8 = row.insertCell(9);
        var element8 = document.createElement("input");
        element8.type = "text";
	    element8.size = "3";
        element8.name="ttotal"+rowCount;
        cell8.appendChild(element8);
		
				var cell8 = row.insertCell(10);
        var element8 = document.createElement("input");
        element8.type = "hidden";
		element8.value = freeqty;
	    element8.size = "3";
        element8.name="freeqty"+rowCount;
        cell8.appendChild(element8);
		
						var cell8 = row.insertCell(11);
        var element8 = document.createElement("input");
        element8.type = "hidden";
		element8.value = grpid;
	    element8.size = "3";
        element8.name="grpid"+rowCount;
        cell8.appendChild(element8);
		
        var cell8 = row.insertCell(12);
        var element8 = document.createElement("input");
        element8.type = "text";
		element8.value = tatypeee;
	    element8.size = "5";
        element8.name="tatypeee"+rowCount;
        cell8.appendChild(element8);
		
		
		
		

		
		
		document.form2.totalcnt.value = rowCount; 
        shappycode(); 

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
				 if (j==4) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "weight1"+i;}
				  if (j==5) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "mrp" + i;}
				   if (j==6) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "sprice"+i;}
				    if (j==7) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "qty"+ i;}
					 if (j==8) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "ttotaldis"+ i;}
		               if (j==9) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "ttotal"+ i;}
					     if (j==10) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "freeqty"+ i;}
						  if (j==11) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "grpid"+ i;}
						  if (j==12) {document.getElementById(tableID).rows[i].cells[j].getElementsByTagName('INPUT')[0].name = "tatypeee"+ i;}
						  
						  

					  
		       
           }
    }
	
  //  input name text updatedin finished 
  
				  
				  
				   				  
        }catch(e) {
            alert(e);
        }
		shappycode() ;
    }
	






function shappycode1(){

  document.form2.netpay.value = Number(document.form2.stotal.value) - Number(document.form2.rsdis.value) -(document.form2.stotal.value*document.form2.sdis.value)/100  ;
  document.form2.paid.value = document.form2.netpay.value;
  
  balancecalc();

}


function balancecalc(){

  document.form2.balance.value = Number(document.form2.netpay.value) - Number(document.form2.paid.value) ;
 

}



