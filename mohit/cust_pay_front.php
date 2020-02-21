<?php

include ('sample1_head.php');

$t_date = date("d/m/Y");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

<script language="javascript">

function myFunction()
{
document.getElementById("form1").submit();
	
}

function getbarcode(str)
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
		
	//alert (fruits);
	document.form1.barcode.value  = fruits;
  
    }
  }
xmlhttp.open("GET","get_barcode.php?q="+str,true);
xmlhttp.send();
}

</script>


</head>

<body>
 
<form  id="form1" name = "form1" action = "master_add_back.php"  method = "post" >



<div>  

 <h3 align="center"> ADD NEW ITEM  </h3>  


<table width="40%" cellspacing="5" cellpadding="2" border="2" align="center" >

<tr> <td width="20%" > DESCRIPTION:  </td>  <td width="2%" > <input type = "text" size="40"   name = "desc" id = "desc"/> </td>   </tr>
 

<tr> <td> MRP  </td>  <td> <input type = "text" autocomplete = "off" size="40" name = "mrp" id = "mrp"/>  </td>   </tr>

<tr> <td> Selling Price: </td>  <td> <input type = "text" size="40" name = "sprice" id = "sprice"/>  </td>   </tr>


<tr> <td> Date of Packing </td>  <td> <input type = "text" size="30"  onchange = "isDate(this.value)"  value = "<?php echo $t_date ?>" name = "dop"  id = "dop"/> <a href="javascript:NewCal('dop','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>  </td>   </tr>
<tr> <td> Expiary Date </td>  <td> <input type = "text" size="30"  onchange = "isDate(this.value)"  value = "<?php echo $t_date ?>" name = "expdate"  id = "expdate"/> <a href="javascript:NewCal('expdate','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>  </td>   </tr>

<tr> <td> Batchno </td>  <td> <input type = "text" size="40" autocomplete = "off" name = "batchno"  id = "batchno" />  </td>   </tr> 

<tr> <td> Quantity </td>  <td> <input type = "text" size="40" autocomplete = "off" name = "qty" value = "1" id = "qty"/>  </td>   </tr> 

<tr> <td> Short Value </td>  <td> <input type = "text" size="40" name = "trigger" value = "20" id = "trigger"/>  </td>   </tr>
 
<tr> <td> Barcode </td>  <td> <input type = "text" size="20" autocomplete = "off" name = "barcode" id = "barcode"/>   </td>   </tr>



<tr> <td  style="text-align:center" colspan="2"  > <input type="button" onclick="myFunction()" value="ADD ITEM"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" >   <input type="button" name="btnprint" value="Get System barcode" onClick="getbarcode(1)"/> </td>   </tr>




</table>

</div>
</div>
</form>

<script>
window.onload=document.form1.desc.focus() ; 


</script>

</body>
</html> 