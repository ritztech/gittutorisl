<?php

include ('sample1_head.php');

include("config.php");

$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'--MRP--', `mrp`)) AS `desc` FROM `m_master_store`order by 2";
$result_dispMake=mysql_query($query_dispMake);

$query_barcode="SELECT max(bar_value) FROM `barcode_gen` ";
$result_barcode=mysql_query($query_barcode);

$result_barcode1 = mysql_fetch_array($result_barcode);


$t_date = date("d/m/Y");


?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/bill_items.js"> </script>

<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

  <link href="suggest_12/css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT LANGUAGE="JavaScript" src="suggest_12/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="suggest_12/js/script.js"></SCRIPT>



<script language="javascript">

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


		
document.form1.itemid.value = arfruits[0];
document.form1.desc.value = arfruits[1];
document.form1.mrp.value = arfruits[3];
document.form1.sprice.value = arfruits[2];
document.form1.qty.value = arfruits[4];
document.form1.barcode.value = arfruits[6];
document.form1.trigger.value = arfruits[5];
document.form1.dop.value = arfruits[7];
document.form1.expdate.value = arfruits[8];
document.form1.batchno.value = arfruits[9];

var dopval = document.form1.dop.value;

if (dopval == "00/00/0000 ") {	
dopval = " ";
document.form1.dop.value = dopval;

}

var dopval_1 = document.form1.expdate.value;

if (dopval_1 == "00/00/0000 ") {	
dopval_1 = " ";
document.form1.expdate.value = dopval_1;

}

  document.form1.keyword.value = "";
  document.form1.keyword.focus();





	
    }
  }
xmlhttp.open("GET","get_bill_item_edit.php?q="+str,true);
xmlhttp.send();



}


function get_barcode()
{
	
document.form1.barcode.value = document.form1.barcode_sys.value;
document.form1.barcode_status.value = 1;

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



function myFunction()
{
document.getElementById("form1").submit();
	
}
          
		  

		  

</script>

</head>


<body>
 
<form  name = "form1" id = "form1" action = "ed_master_add_back.php"  method = "post" >
 <h3 align="center"> EDIT ITEM  </h3> 
<table width="40%" cellspacing="5" cellpadding="2" border="2" align="center" >
<tr>

<td colspan="2"><div id="holder"> 
		  <input type="text" placeholder="SEARCH ITEM ...."   size = "61" style="background-color:#925E0A; color:#F8F7F7; font-weight:bold; font-size:16px;" autocomplete = "off"  id="keyword" name = "keyword" > 
		 </div>
		 <div id="ajax_response"></div></td>  
</tr>	


<tr> <td > ITEM ID:  </td>  <td  > <input type = "text" size="40"  readonly name = "itemid" id = "itemid"/> </td>   </tr>

<tr> <td > DESCRIPTION:  </td>  <td > <input type = "text" size="40"  name = "desc" id = "desc"/> </td>   </tr>
 

<tr> <td> MRP  </td>  <td> <input type = "text" size="40" name = "mrp" id = "mrp"/>  </td>   </tr>

<tr> <td> Selling Price: </td>  <td> <input type = "text" size="40" name = "sprice" id = "sprice"/>  </td>   </tr>

<tr> <td> Quantity </td>  <td> <input type = "text" size="40"  name = "qty"  id = "qty"/>  </td>   </tr>

<tr> <td> Exp date</td>  <td> <input type = "text" size="30" name = "expdate"  onchange = "isDate(this.value)"  id = "expdate"/>  <a href="javascript:NewCal('expdate','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>   </td>   </tr>


<tr> <td> Dat of Pack </td>  <td> <input type = "text" size="30" name = "dop"  onchange = "isDate(this.value)"  id = "dop"/>  <a href="javascript:NewCal('dop','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>   </td>   </tr>



<tr> <td> Batchno </td>  <td> <input type = "text" size="40" name = "batchno" id = "batchno"  />  </td>   </tr>

<tr> <td> Short Value </td>  <td> <input type = "text" size="40" name = "trigger"  id = "trigger"/>  </td>   </tr>

<tr> <td> Barcode </td>  <td> <input type = "text" size="20" name = "barcode"  id = "barcode"/>  <input type="button" name="btnprint" value="Get System barcode" onClick="getbarcode(1)"/>   </td>    </tr>


<tr> <td  style="text-align:center" colspan="2"  > <input type="button" onclick="myFunction()" value="SAVE" >  </td>   </tr>






</table>


</div>
</div>
</form>

<script>
window.onload=document.form1.keyword.focus();
</script>

</body>
</html> 