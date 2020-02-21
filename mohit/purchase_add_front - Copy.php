<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");

$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'-', `capacity`,'-', `cmp_name`,'-', `storage`,'-',qty)) AS `desc` FROM `m_master_store`";
$result_dispMake=mysql_query($query_dispMake);
    


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_items.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_valid.js"> </script>
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
	
	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[2]);

	
    }
  }
xmlhttp.open("GET","get_purchase_item.php?q="+str,true);
xmlhttp.send();



}



</script>




</head>

<body>
<div class = "head1" >
<div class = "center_page">


 
<form name = "form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >

</br>


<div id="p1itemcontainer"> 


	<div class="emprightDiv">
	 
<font color="blue"> <h3> ADD NEW PURCHASE DETAILS </h3>  </font> 

	 
	<?php

    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $filename =  $parts[count($parts) - 1];
	
?>
 
	 
	 
<table>
<tr>
<td> MEDICINE <select name = "item_id">
	<option   value="" selected="selected"> </option>
	<?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option value = {$query_data['id']}>{$query_data['desc']}</option>"; 

	 }
	 ?> </select>  </td>
	 
 <td> <INPUT type="button" value="ADD DRUG" onclick="h123(item_id.value)" /> </td>




 

</tr>



</table>


	   
	 
	 
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





</br>
</br>

<div id="purchasecontainer"> 
</br>
<div>
	<div class="empleftDiv">Purchase_id:</div>
	<div class="emprightDiv"><input type = "text" size="15"  readonly name = "pid" value= <?php echo  $row1['purchase_id']?> id = "pid"/> </div>
</div>

<div>
	<div class="empleftDiv">Purchase_date:</div>
	<div class="emprightDiv"><input id="demo1" type = "text"  size="15"  name = "pdate" value= <?php echo  $t_date ?> id = "pdate" />  <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>
	
</div>


<div class="empleftDiv"> Vendor: </div>
	<div class="emprightDiv">

	<select name = "v_id" >
	<option   value="" selected="selected"> </option>
	<?php 

	while($query1_data = mysql_fetch_array($result_dispMake1)){
	 
	 echo"<option value = {$query1_data['id']}>{$query1_data['name']}</option>"; 

	 }
	 ?> </select>  
	 
	 </div>
	 

<div>
	<div class="empleftDiv">Receipt No:</div>
	<div class="emprightDiv"><input type = "text" size="15"   name = "pct"  id = "pct"/></div>
</div>


<div>
	<div class="empleftDiv">Cash/Credit:</div>
	<div class="emprightDiv"> <select id='ptype'  name = 'ptype'>
	<option>CASH</option>
	<option>CREDIT</option>
</select> </div>
</div>

</br>

<div id="p2itemcontainer"> 
<div>
	<div class="empleftDiv">Total:</div>
	<div class="emprightDiv"><input type = "text" size="15"   name = "ptotal"  id = "ptotal"/></div>
</div>



<div>
	<div class="empleftDiv">Paid:</div>
	<div class="emprightDiv"><input type = "text" name = "ppaid" onChange="phappycode1()"   id = "ppaid"/></div>
</div>
<div>
	<div class="empleftDiv">Balance:</div>
	<div class="emprightDiv"><input type = "text" name = "pbalance"  id = "pbalance"/></div>
</div>
<div>
	<div class="empleftDiv">Notes:</div>
	<div class="emprightDiv"><input type = "text" name = "pnotes" value = "None" id = "pnotes"/></div>
</div>
<div>
	<div class="empleftDiv">User:</div>
	<div class="emprightDiv"><input type = "text" readonly name = "euser"  id = "euser"  value = "<?php echo  $_SESSION['uname'] ?>" /></div>
</div>

</div>







<INPUT type="button" style = "color:red; font-weight:bold;height: 22px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onclick="deleteRow('dataTable')" />

</br>


<table  id="dataTable"  border='1' cellpadding='1' frame="box"   >

<tr> <th>  </th>  <th>Check</th>    <th>SNO</th>  <th> DESC </th>  <th> SELL PRICE </th> <th> PRICE </th>  <th> QTY </th> <th> EXPIARY </th>  <th> TOTAL </th> </tr> 

</table>



</br>
<table border='1' cellpadding='1'  >

<tr>
<td> Total items <input type = "text"  width="30" name = "totalcnt" id = "totalcnt"  /> </td>
<td> Total Amount <input type = "text"  width="30" name = "alltotal" id = "alltotal"  /> </td>


</tr>

<table>


</div>






</div>
</div>
</div>
</br>

<input type="submit" name="submit"  style="color:green;" value="SAVE DETAILS">

</form>




</div>
</div>
</div>


</body>
</html> 