
<?php

include ('sample1_head.php');

include("config.php");



$query_sales="SELECT `id`,upper(CONCAT(`name`)) AS `name` FROM m_salesman";
$result_sales=mysql_query($query_sales);



?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/bill_items.js">  </script>

  <link href="suggest_12/css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT LANGUAGE="JavaScript" src="suggest_12/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="suggest_12/js/script.js"></SCRIPT>
 
 
 
       <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  


<script language="javascript">

		

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	

 function h789(str)
{


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	var arfruits = fruits.split(',');
	
	var valuecnt = arfruits[4];
	
	    if (valuecnt == 0)
       { 
   
   alert('Item not found ...');
  document.form2.barscan.value = "";
  document.form2.barscan.focus();
  }

//alert(valuecnt);


    if (valuecnt == 1)
       { 
   
   // code to add duplicate in one row 
	
	var itemno_1 = arfruits[0].trim();
			//var itemno_1 = eval("arfruits[0]");
	var k = document.form2.totalcnt.value;
	
	var kr = Number(k) ;
	//alert(kr);
    var duplicate = 0;	
	if(kr >= 1)
	{ 

     for (var i=1; i<=kr; i++)
	 {
		 
		//var itemid = document.form2.mastitem"+i+".value; 
		
		var itemid = document.form2[ "mastitem" + i ].value;
		var item_qty = document.form2[ "qty" + i ].value;
		
	//	alert('Grid item id ' + itemid);
		//alert('New  item id ' + itemno_1);
		 
		 if (itemid == itemno_1)
		 { 
	        
			 document.form2[ "qty" + i ].value = Number(item_qty) + 1;
			 duplicate = 1;
			 shappycode();
		 }
			 
	 }
	 
	}
		// code finish
	
	
	if(duplicate == 0)
	{addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[5],arfruits[6],arfruits[7],arfruits[8]);
	}
	
   

}




    }
  }
xmlhttp.open("GET","get_bill_item_new.php?q="+str,true);
xmlhttp.send();

document.form2.barscan.focus()


}



function h123(str)
{





if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	var arfruits = fruits.split(',');
	
	// code to add duplicate in one row 
	
	var itemno_1 = arfruits[0].trim();
	
		//var itemno_1 = eval("arfruits[0]");
	var k = document.form2.totalcnt.value;
    var duplicate = 0;	
	if(k > 1)
	{ 

     for (var i=1; i<=k; i++)
	 {
		 
		//var itemid = document.form2.mastitem"+i+".value; 
		
		var itemid = document.form2[ "mastitem" + i ].value;
		var item_qty = document.form2[ "qty" + i ].value;
		
	//	alert('Grid item id ' + itemid);
		//alert('New  item id ' + itemno_1);
		 
		 if (itemid == itemno_1)
		 { 
			 document.form2[ "qty" + i ].value = Number(item_qty) + 1;
			 duplicate = 1;
			 shappycode();
			 
			   document.form2.keyword.value = "";
               document.form2.barscan.focus();
  
		 }

			 
	 }
     
	}
		// code finish
	
	if(duplicate == 0)
	{addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[4],arfruits[5],arfruits[6],arfruits[7]);

  document.form2.keyword.value = "";
  document.form2.barscan.focus();
  

	}
	
    }
  }
xmlhttp.open("GET","get_bill_item.php?q="+str,true);
xmlhttp.send();




}
	
	


function getDistrict(provinceId) {	


    	
	var strURL="findDistrict_new.php?province="+provinceId;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {						
					document.getElementById('districtdiv').innerHTML=req.responseText;
					document.getElementById('communediv').innerHTML=req.responseText;	
                    
						
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}


function myFunction()
{
	
var k = document.form2.totalcnt.value;

	if( document.form2.totalcnt.value == "" )
   {
     alert( "Please add items .. !" );
     document.form2.keyword.focus() ;
     return false;
   }
   
   
   for (var init=1; init<=k; init++)
  {
    var dt=document.form2[ "mastdesc" + init ]
	
	    if (dt.value == "")
		{
			alert( "Please fill item name ...!" );
	           dt.focus()
              return false
        }
		
		var dt=document.form2[ "sprice" + init ]
	
	    if (dt.value <=0)
		{
			alert( "Please fill item price ...!" );
	           dt.focus()
              return false
        }
		
			var dt=document.form2[ "qty" + init ]
	
	    if (dt.value <=0)
		{
			alert( "Please fill item qty ...!" );
	           dt.focus()
              return false
        }
		
			var dt=document.form2[ "ttotal" + init ]
	
	    if (dt.value <=0)
		{
			alert( "Please fill item Total ...!" );
	           dt.focus()
              return false
        }
		
		
 }
  
   

	if( document.form2.stotal.value <=0 )
   {
     alert( "Please add item amount , Bill total can't be zero .. !" );
     document.form2.keyword.focus() ;
     return false;
   }

        	if( document.form2.netpay.value <=0 )
   {
     alert( "Please add item amount , Bill net total  can't be zero .. !" );
     document.form2.keyword.focus() ;
     return false;
   }
   
   
	
	
var p_bal_z = document.form2.balance.value;
var p_custid_z = document.form2.cst_name.value;

if(p_bal_z > "0")
{
	if(p_custid_z == "")
	{
	
	alert('Please fill customer name if balance is greate than zero ..');
	document.form2.cst_name.focus();
	return false;
	}
}



	
	
document.getElementById("form2").submit();
	
}



function hgetsname(thelist,cid) {
    var idx = thelist.selectedIndex;
    var content = thelist.options[idx].innerHTML;

	
	var arfruits = content.split('**');
	
    document.form2.sales_name.value = arfruits[0];

	//hgetdues(cid);
	
}

function hgetcstname(thelist,cid) {
    var idx = thelist.selectedIndex;
    var content = thelist.options[idx].innerHTML;

	
	var arfruits = content.split('**');
	
    document.form2.cst_name.value = arfruits[0];
	document.form2.custcon.value = arfruits[1];
	document.form2.cust_status.value = "1";
	document.form2.cust_id12.value = cid;
	
	
	
	

	//hgetdues(cid);
	
}

function fgetcustvalchange()  {
	
	document.form2.cust_status.value = "0";
	
	
}



   $(function() {
       		 
  		$(".auto").autocomplete({
					 
            minLength: 0,
            source: "search.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			 // $( ".auto" ).val( ui.item.label );
               $( "#custid" ).val( ui.item.value);
			   $( "#custcon" ).val( ui.item.desc);
			 //  $( "#cname" ).val( ui.item.desc1);
			 
			 
			 
			if( ui.item.net_due > 0)
			{
				alert('This customer alreday have dues worth : '+ui.item.net_due);
				
			}
			   
			   
             //  $( "#project-description" ).html( ui.item.desc );
			   
			 //  alert(ui.item.value);
			 	//	 document.form2.sales_id.focus() ;
			   
			 
			   
               return false;
            }
         }
		 
)		 
		 
         .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
         };
         });

		 



document.addEventListener('keydown', (event) => {
  const keyName = event.key;
  
 // alert(keyName);

  if(keyName == "F1")
  {
	 	 myFunction();
		  
		  
	  
  }
  
  
    if(keyName == "F2")
  {
	 	

		document.form2.billstatus.value = 2;
		myFunction();
		  
		  
	  
  }
  

  
  
  

  }, false);
  
  
  
  	$.ctrl = function(key, callback, args) {
    $(document).keydown(function(e) {
        if(!args) args=[]; // IE barks when args is null 
        if(e.keyCode == key.charCodeAt(0) && e.ctrlKey) {
            callback.apply(this, args);
            return false;
        }
    });        
};


$.ctrl('C', function(s) {
   // alert(s);
    
   document.form2.paytype.value = 1;
   
   document.form2.barscan.focus();
}, ["Control s pressed"]);

$.ctrl('V', function(s) {
   // alert(s);
   document.form2.paytype.value = 2;
   document.form2.barscan.focus();
}, ["Control s pressed"]);


  

      </script>
	  
	  
	  



</head>

<body>


<form  id="form2" name = "form2" method="post"    action="bill_add_back.php">

<br>

<div  align = "center">  <b>  SALE INVOICE </b>  </div>
<table   width="70%"  border="1" style="border-collapse:collapse;"  bgcolor="white" align="center"  >

<tr>
	
	 <td>
         	 <div id="holder"> 
		 <input type="text"   size = "20" tabindex = "2" placeholder="SEARCH ITEM" style="font-weight:bold; font-size:18px; color:#FCFCFC; background-color:#9E6D04;" autocomplete = "off"  id="keyword" name = "keyword" > 
		 </div>
		 <div id="ajax_response"></div>
     
      </td>

   
          <td align = "center">  <div id="districtdiv">
           	  <select name="district" class="form-control" style="width:180px" >
                        	<option>&larr; Select Item &rarr;</option>
           	</select>
       	  </div>
		  </td>
	
<td>   

		
     <input type = "text" name = "barscan" tabindex = "1" autocomplete = "off"  tabindex="0"  onchange = "getDistrict(this.value),h789(this.value)" id = "barscan" /> 
				

</td>

	 
	 
		  
</tr>	



	
</table>	 







<?php


include('config.php');
$t_date = date("d/m/Y");

?>



<table width="70%" cellspacing="0" cellpadding="0" border="1"  bgcolor="white" align="center" >


<tr style="background-color:#000000;  color:#FFF;">  <td colspan = 2 align = "center">
 Total <input type = "text" name = "stotal" size="8" readonly style="background-color:#BB1013; color:#F1ECEC; font-size:13px; font-weight:bold;"  id = "stotal"/>
 
 	%.Dis:<input type = "text" onKeyUp="shappycode1()" name = "sdis" size = "3" value = "0"  id = "sdis"/> 
	Rs .Dis:<input type = "text" onKeyUp="shappycode1()" name = "rsdis"  size = "3"  value = "0"  id = "rsdis"/> 
	
 
 
 NET PAY <input type = "text" name = "netpay" size="8" readonly style="background-color:#BB1013; color:#F1ECEC; font-size:13px; font-weight:bold;"  id = "netpay"/>
 PAID<input type = "text" onKeyUp="balancecalc()"   name = "paid" size="5"   id = "paid"/>
 BALANCE <input type = "text" readonly name = "balance" size="5" value = "0" id = "balance"/>
 DATE : </b><input type = "text" size = "8" name = "sdate" value = <?php echo  $t_date ?>  id = "sdate"/>


 




 </td>  </tr>
 
  

<tr>
<td colspan = 2 align = "center"> 
	  Name : <input type = "text" name = "cst_name"  value = ""  class='auto'  size = "30"  />
 <input   name="custid"   id="custid"  value = "1"  type="hidden"   size = "5">	  
	  Contact   <input type = "text"  id = "custcon"  maxlength = "10" name = "custcon" />  
	 
  
  


	  Salesman:  <select name = "sales_id"  style="width:100px" onchange = "hgetsname(this,this.value)"  >
	<option   value="0" selected="selected"> SALESMAN </option>
	<?php 

	while($query1_data = mysql_fetch_array($result_sales)){
	 
	 echo"<option value = {$query1_data['0']}>{$query1_data['1']}</option>"; 

	 }
	 ?> </select>
	 


	  </td> </tr>
	  
	 <tr>

<td style="text-align:center" colspan="2"  > 
<INPUT type="button" style = "color:red; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onclick="deleteRow('dataTable')" />

<b>Payment Type:</b>    <select name = "paytype"   style="width:150px" tabIndex = "8" >

<option value = "1">CASH</option>
<option value = "2">CARD</option>
<option value = "1774">CHQ</option>

 </select> 
	 
 <input type="button" tabindex = "8" value = "SAVE" style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()"   />

 
 
  </td>


</tr>
	 
    <tr>
    <td colspan = 2 align = "center" >

	SAVING :<input type = "text" name = "tsaving"   id = "tsaving"/> </td>
  </tr>
  
 </tr>

  




<tr>  


<td  style="text-align:center" colspan="2"  > 

<table width="100%"  id="dataTable" border='1' style="border-collapse:collapse;" cellpadding='1'   >

  <tr>
    <th>  </th>  <th>Check</th>    <th>SNO</th>   <th>ITEM NAME</th>  <th>WEIGHT</th>  <th>MRP</th>  <th>PRICE</th>  <th><font color="red"> QTY </font> </th>  <th>SAVINGS</th> <th>TOTAL</th> <th></th><th></th><th>GST%</th> 
  </tr>
  
 

</table>   </td>


 </tr>

</table>




</div>


<input  type = "hidden"  size = "30" name = "sales_name" id = "sales_name"  value = "SALESMAN" />
<input  type = "hidden"  size = "30" name = "cust_status" id = "cust_status"  value = "0" />
<input  type = "hidden"  size = "30" name = "cust_id12" id = "cust_id12"  value = "0" />




<input class = "noPrint" type = "text"  width="30"   value = "" name = "totalcnt" id = "totalcnt"  /> 

<input   class = "noPrint"  type = "text"  size = "5"   value = "1" name = "billstatus" id = "billstatus"  /> 


 <input class = "noPrint" type = "text"  width="30" name = "alltotal" id = "alltotal" value="0" /> 




</br>

</br>



</form>



</div>
</div>

<script>
window.onload=document.form2.barscan.focus(); 
//document.getElementById("mySubmit").disabled = true;

</script>


</body>
</html> 