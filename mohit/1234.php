<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");

$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'--MRP--', `mrp`)) AS `desc` FROM `m_master_store`order by 2";
$result_dispMake=mysql_query($query_dispMake);




?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/purchase_items_barcode.js"> </script>

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
	
	var valuecnt = arfruits[6];
	
	


	    if (valuecnt == 0)
       { 
  document.form2.barscan.value = "";
  document.form2.barscan.focus();
  
}


    if (valuecnt == 1)
       { 
        
	addRow('dataTable',arfruits[0],arfruits[1],arfruits[4],arfruits[2],arfruits[5]);
}




    }
  }
xmlhttp.open("GET","get_bill_item_new_barcode.php?q="+str,true);
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
	
	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[4],arfruits[2],arfruits[5]);


	
    }
  }
xmlhttp.open("GET","get_purchase_item.php?q="+str,true);
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




<form id = "form2" name = "form2" method="post" action="t123.php"  onSubmit="return ValidateForm()" >


<div style="height:40px;width:200px;float:left;margin:10px 60px 10px 200px;">

 

<table   width="100%" cellspacing="5" cellpadding="2" border="2"  >



<tr>
    
	
	 <td><input type = "text" name = "barscan" onkeyup = "getDistrict(this.value),h789(this.value)" id = "barscan" /> </td>
	 
	 		  

   
          <td width="428">  <div id="districtdiv">
           	  <select name="district" class="form-control" style="width:150px" >
                        	<option>&larr; Select Item &rarr;</option>
           	</select>
       	  </div></td>
		  
		  
		     <td> SELECT ITEM </td> <td> <select name = "item_id" style="width:150px" >
	<option   value="" selected="selected"> </option>
	<?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['id']}>{$query_data['desc']}  </option>"; 

	 }
	 ?> </select> </td>  
	 <td> <INPUT type="button" value="ADD ITEM" onclick="h123(item_id.value)" /> </td>
	 
		  
</tr>	



	
</table>	 
</div>






<?php


include('config.php');





?>


</br>
</br>





<div  style="height:400px;width:350px;float:left;margin:70px 10px 10px -260px;">


<table width="100%" cellspacing="5" cellpadding="5" border="3" >


<tr>

<td style="text-align:center" colspan="2"  > <INPUT type="button" style = "color:red; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onclick="deleteRow('dataTable')" />  
 <input type="button" onclick="myFunction()" value="SAVE"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" >
 </td>


</tr>

<tr>  


<td  style="text-align:center" colspan="2"  > 

<table width="100%"  id="dataTable" border='1' cellpadding='1'   >

  <tr>


<tr> <th>  </th>  <th>Check</th>    <th>SNO</th>  <th> ITEM NAME </th>  <th> BARCODE </th>  <th> PRICE </th> <th> DOP </th>  <th> COUNT </th> </tr> 

  </tr>
  
 

</table>   </td>


 </tr>

</table>




</div>






<input class = "noPrint" type = "text"  width="30" name = "totalcnt" id = "totalcnt"  /> 




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