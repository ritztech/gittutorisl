<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");

$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'**MRP**', `mrp`)) AS `desc` FROM `m_master_store` order by 2";
$result_dispMake=mysql_query($query_dispMake);




?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/bill_items.js">  </script>

<link rel="stylesheet" href="suggest/css1/style.css" />
<script type="text/javascript" src="suggest/js/jquery.min.js"></script>
<script type="text/javascript" src="suggest/js/script.js"></script>


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
	{addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[5]);
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
			 
			   document.form2.country_id.value = "";
               document.form2.barscan.focus();
  
		 }

			 
	 }
     
	}
		// code finish
	
	if(duplicate == 0)
	{addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[4]);

  document.form2.country_id.value = "";
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
document.getElementById("form2").submit();
	
}






</script>

</head>

<body>


<div class = "head1" >
<div class = "center_page">



<form  id="form2" name = "form2" method="post"    action="bill_add_back.php">


<div style="height:40px;width:200px;float:left;margin:10px 60px 10px 200px;">

 

<table   width="100%" cellspacing="5" cellpadding="2" border="2"  >



<tr>
    
	
	 <td><input type = "text" name = "barscan" autocomplete = "off"   onchange = "getDistrict(this.value),h789(this.value)" id = "barscan" /> </td>
	 
	 		  

   
          <td width="428">  <div id="districtdiv">
           	  <select name="district" class="form-control" style="width:150px" >
                        	<option>&larr; Select Item &rarr;</option>
           	</select>
       	  </div></td>
		  
		  
	
<td>   

                <div class="label_div"><b>SELECT ITEM: </b></div>  </td>  <td>
                        <div class="input_container">
               <input type="text" id="country_id"  autocomplete = "off" name="country_id" onKeyUp="autocomplet()" />
					<ul id="country_list_id"></ul>
					 
					 
                </div>
				
				

</td>

	 
	 
		  
</tr>	



	
</table>	 
</div>






<?php


include('config.php');


$query_dispMake1="SELECT `did`, upper(CONCAT(`dname`,'---', `dcontact`)) AS `dname` FROM `doc_master` ";
$result_dispMake1=mysql_query($query_dispMake1);



$t_date = date("d/m/Y");

$result1 = mysql_query("SELECT max( `sell_id` ) sell_id  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);

$sellid = $row1[0];

$sqlupd124="UPDATE m_auto_id SET sell_id=($sellid + 1)  WHERE sell_id=$sellid";
mysql_query($sqlupd124,$dbConn);







?>


</br>
</br>





<div  style="height:400px;width:350px;float:left;margin:70px 10px 10px -260px;">


<table width="100%" cellspacing="5" cellpadding="5" border="3" >

<tr>  <td><font color="red"> NET PAY</font> </td>  <td><input type = "text" name = "netpay"  id = "netpay"/> </td>  </tr>

<tr>
 <td width="50%">

<table >
  
  
  <tr>
<td>  NAME:   </td>  <td> <select name = "uname"  style="width:150px" >
	<option   value="1" > CASH </option>
	<?php 

	while($query1_data = mysql_fetch_array($result_dispMake1)){
	 
	 echo"<option value = {$query1_data['did']}>{$query1_data['dname']}</option>"; 

	 }
	 ?> </select>    </td>

</tr>



  
  
  
    <tr>
    <td colspan = 2 >*** PAYMENT TERMS ***</td>  
  </tr>
  
    <tr>
    <td>CASH</td>  <td> <input type = "text" onchange = "balduecode()" name = "totalcash"   id = "totalcash" /> </td>
  </tr>
    <tr>
    <td>CARD</td>  <td> <input type = "text" name = "totalcard" onchange = "balduecode()"  value = "0" id = "totalcard" /> </td>
  </tr>
    <tr>
    <td>SODEXO</td>  <td> <input type = "text" name = "totalsodexo" onchange = "balduecode()"  value = "0"  id = "totalsodexo" /> </td>
  </tr>
      <tr>
    <td>CREDIT</td>  <td> <input type = "text" name = "totalcredit"  onchange = "balduecode()" value = "0"  id = "totalcredit" /> </td>
  </tr>
        <tr>
    <td>DUE </td>  <td> <input type = "text" name = "totaldue"   id = "totaldue" /> </td>
  </tr>

</table>


</td>

 <td width="30%">

<table >
  <tr>
    <td>BILL NO</td>  <td> <input type = "text" readonly  name = "billno" value = <?php echo  $row1['sell_id']?>  id = "billno"/> </td>
  </tr>
  <tr>
    <td>SELL DATE</td>  <td><input type = "text" name = "sdate" value = <?php echo  $t_date ?>  id = "sdate"/> </td>
  </tr>
    <tr>
    <td>TOTAL</td>  <td> <input type = "text" name = "stotal"  id = "stotal"/> </td>
  </tr>
   <tr>
    <td>%.Dis</td>  <td><input type = "text" onkeyup="shappycode1()" name = "sdis" value = "0"  id = "sdis"/> </td>
  </tr>
     <tr>
    <td>Rs .Dis</td>  <td><input type = "text" onkeyup="shappycode1()" name = "rsdis" value = "0"  id = "rsdis"/> </td>
  </tr>
 </tr>
     <tr>
    <td>SAVING </td>  <td><input type = "text" name = "tsaving"   id = "tsaving"/> </td>
  </tr>
  
 
</table>


</td>



</tr>


<tr>

<td style="text-align:center" colspan="2"  > <INPUT type="button" style = "color:red; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onclick="deleteRow('dataTable')" />  
 <input type="button" onclick="myFunction()" value="SAVE"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" >
 </td>


</tr>

<tr>  


<td  style="text-align:center" colspan="2"  > 

<table width="100%"  id="dataTable" border='1' cellpadding='1'   >

  <tr>
    <th>  </th>  <th>Check</th>    <th>SNO</th>   <th>ITEM NAME</th>  <th>MRP</th>  <th>PRICE</th>  <th><font color="red"> QTY </font> </th>  <th>SAVINGS</th> <th>TOTAL</th>  
  </tr>
  
 

</table>   </td>


 </tr>

</table>




</div>






<input class = "noPrint" type = "text"  width="30" name = "totalcnt" id = "totalcnt"  /> 
 <input class = "noPrint" type = "text"  width="30" name = "alltotal" id = "alltotal" value="0" /> 




</br>

</br>



</form>



</div>
</div>

<script>
window.onload=document.form2.barscan.focus() ; 
//document.getElementById("mySubmit").disabled = true;

</script>


</body>
</html> 