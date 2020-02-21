<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");




?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/bill_items_bar_fix.js">  </script>



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
	



	//alert(arfruits[1]);
	addRow('dataTable',arfruits[0],arfruits[1],arfruits[2]);

	
  document.form2.country_id.value = "";
  document.form2.country_id.focus();
  

	
	
    }
  }
xmlhttp.open("GET","get_bill_item_bar_fix.php?q="+str,true);
xmlhttp.send();




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



<form  id="form2" name = "form2" method="post"    action="bill_add_back_bar_fix.php">


<div style="height:40px;width:200px;float:left;margin:10px 60px 10px 200px;">

 

<table   width="100%" cellspacing="5" cellpadding="2" border="2"  >



<tr>
    
	
  
		  
	
<td>   

                <div class="label_div"><b>Input barcode: </b></div>  </td>  <td>
                        <div class="input_container">
               <input type="text" id="country_id"  autocomplete = "off" name="country_id" onchange="h123(this.value)" />
				
					 
					 
                </div>
				
				

</td>

	 
	 
		  
</tr>	

<tr>

<td>  <INPUT type="button" style = "color:red; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onclick="deleteRow('dataTable')" /> </td>
<td>  <input type="button" onclick="myFunction()" value="SAVE"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" />  </td>

</tr>

	
</table>



 
</div>


   


</br></br>


<div  style="height:400px;width:350px;float:left;margin:70px 10px 10px -260px;">



<table width="100%"  id="dataTable" border='1' cellpadding='1'   >

  <tr>
    <th>  </th>  <th>Check</th>    <th>SNO</th>   <th>ITEM NAME</th>  <th>BARCODE</th>   
  </tr>
  
 

</table> 






</div>






<input  type = "hidden"  width="30" name = "totalcnt" id = "totalcnt"  /> 





</br>

</br>



</form>



</div>
</div>

<script>
window.onload=document.form2.country_id.focus() ; 
//document.getElementById("mySubmit").disabled = true;

</script>


</body>
</html> 