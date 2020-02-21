<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");

//$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'--MRP--', `mrp`)) AS `desc` FROM `m_master_store`order by 2";
//$result_dispMake=mysql_query($query_dispMake);
    


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_items.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_valid.js"> </script>

  <link href="suggest_13/css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT LANGUAGE="JavaScript" src="suggest_13/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="suggest_13/js/script.js"></SCRIPT>


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
	

	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[4]);
  document.form2.keyword.value = "";
  document.form2.keyword.focus();
  

	
    }
  }
xmlhttp.open("GET","get_purchase_item.php?q="+str,true);
xmlhttp.send();



}

function myFunction()
{
	
	return ValidateForm();
	

	
}




</script>




</head>

<body>
<div class = "head1" >
<div class = "center_page">


 
<form name = "form2"  id = "form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >



<div id="purchasesummary_1"> 

</br>

	<div class="emprightDiv">
	 
<font color="blue"> <h3> ADD NEW PURCHASE DETAILS </h3>  </font> 

	 
	<?php

    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $filename =  $parts[count($parts) - 1];
	
?>
 
	 
	 
<table   border="2" style="border-collapse:collapse;"   >
<tr>

<td style="width:450px;">  
 <div id="holder"> 
		 Search Item : <input type="text"   size = "70" autocomplete = "off"  id="keyword" name = "keyword" > 
		 </div>
		 <div id="ajax_response"></div>
         <br>
</td> 
</tr></table>
</br>


	   
	 
	 
	 </div>
	
	
	 
 
 
</div>







<?php

include('config.php');



$t_date = date("d/m/Y");



$result1 = mysql_query("SELECT max( `purchase_id` ) purchase_id  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);

$query_dispMake1="SELECT `id`,`name` FROM `m_vendor` ";
$result_dispMake1=mysql_query($query_dispMake1);



?>







<div id="purchasesummary_2"> 

<table  width="60%" cellspacing="25" cellpadding="5" border="3" style="border-color:#00F; margin-left:-85px; border-collapse:collapse;">

<tr>
<td>
<table width="802"  >
<tr>
<td> Purchase_id:  </td>  <td> <input type = "text" size="15" style="width:130px;"  readonly name = "pid" value= <?php echo  $row1['purchase_id']?> id = "pid"/>  </td>
<td rowspan="5"><table>
<tr>  <td>  Total:  </td>   <td>  <input type = "text" size="15"   name = "ptotal"  id = "ptotal" style="width:138px;"/> </td>  </tr>
<tr>  <td>  Paid:  </td>   <td> <input type = "text" name = "ppaid" onChange="phappycode1()"   id = "ppaid"/>  </td>  </tr>
<tr>  <td>  Balance:  </td>   <td> <input type = "text" name = "pbalance"  id = "pbalance"/> </td>  </tr>
<tr>  <td>   Notes: </td>   <td> <input type = "text" name = "pnotes" value = "None" id = "pnotes"/>  </td>  </tr>
<tr>  <td> User:  </td>   <td> <input type = "text" readonly name = "euser"  id = "euser"  value = "<?php echo  $_SESSION['uname'] ?>" />   </td>  </tr>

</table></td>
</tr>

<tr>
<td > Purchase_date:  </td>  <td >
 <input id="demo1" type = "text"  size="15"  name = "pdate" value= <?php echo  $t_date ?>  /> 
  <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>  </td>
</tr>

<tr>
<td>  Vendor:   </td>  <td> <select name = "v_id" style="width:136px;">
	<option   value="" selected="selected"> </option>
	<?php 

	while($query1_data = mysql_fetch_array($result_dispMake1)){
	 
	 echo"<option value = {$query1_data['id']}>{$query1_data['name']}</option>"; 

	 }
	 ?> </select>    </td>

</tr>

<tr>
<td>  Receipt No:  </td>  <td> <input type = "text" size="15"   name = "pct"  id = "pct" style="width:130px;"/>  </td>
</tr>


<tr>
<td>  Cash/Credit:  </td>  <td> <select id='ptype'  name = 'ptype' style="width:136px;">
	<option>CASH</option>
	<option>CREDIT</option>
</select>  </td>

</tr>


</table>


</td>


</tr>

<tr style="background-color:#FF8000;">  <td style="text-align:center" colspan="2"  > 
<INPUT type="button" style = "color:red; font-weight:bold;height: 29px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onClick="deleteRow('dataTable')" />
<input type="button" onClick="myFunction()" value="SAVE"  style = "color:blue; font-weight:bold;height: 29px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" >
  </td>  </tr>
  
  <tr>  


<td  style="text-align:center" colspan="2"  > 

<table  width="100%"  id="dataTable"  border='1' cellpadding='1' frame="box"   >

<tr> <th>  </th>  <th>Check</th>    <th>SNO</th>  <th> ITEM NAME </th>  <th> MRP  </th> <th> Selling Price </th>  <th> Buy Price </th> <th> QTY </th> <th> EXPIARY </th>  <th> BATCHNO </th>   <th> Free item name</th> <th> Free_QTY </th> <th> Trigger </th> <th> TOTAL </th> <th> BARCODE </th>  </tr> 

</table>





</td>  </tr>





</table>







</br>


<input class = "noPrint"  type = "text"  width="30" name = "totalcnt" id = "totalcnt"  /> 
<input  class = "noPrint"  type = "text"  width="30" name = "alltotal" id = "alltotal"  /> 




</div>






</div>
</div>
</div>
</br>



</form>




</div>
</div>
</div>

<script>
window.onload=document.form2.keyword.focus();
</script>



</body>
</html> 