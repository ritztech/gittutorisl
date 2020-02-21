<?php

include('config.php');
include ('sample1_head.php');


$query_cust="SELECT `id`,upper(name) AS `name` FROM store_units ";
$result_cust=mysql_query($query_cust);


$id = $_GET['id'];





$result1 = mysql_query("SELECT `itemname`, `qty`, `itemunit`, `itemid` FROM `m_item_store`   WHERE itemid  = $id");

$row1 = mysql_fetch_array($result1);



?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

<script language="javascript">
function unitchange()
{
	
	document.form1.iunit.value  = document.form1.iunit1.value 
}

</script>


</head>

<body>
 
<form  name = "form1" action = "edit_store_bck.php"  method = "post" >

<div > <font color="blue"> <h2 align="center"> EDIT STORE ITEM   </h2> </font>  </div>
</br>
<table width="200" border="0" align="center">
  <tr>
    <td><div>
	<div class="empleftDiv">ITEM NAME:</div>
	<div class="emprightDiv"><input type = "text" name = "clname" id = "clname" value= "<?php echo   $row1['0']?>"  /></div>
</div>
<div>
	<div class="empleftDiv">UNITS:</div>
	<div class="emprightDiv"><input type = "text" name = "iunit" id = "iunit" value= "<?php echo   $row1['2']?>"  />
	<select name = "iunit1"  onchange = "unitchange()" style="width:150px"  >
	<option   value="0" selected="selected"> </option>
	<?php 

	while($query1_data = mysql_fetch_array($result_cust)){
	 
	 echo"<option value = {$query1_data['1']}>{$query1_data['1']}</option>"; 

	 }
	 ?> </select> 
	 
	</div>
</div>

</br>


<div class="emprightDiv"> <input type='submit' value='SAVE' />  
</br>



</div>


<input type="hidden" name="e_sno" id="e_sno" value="<?php echo $id; ?>" />


</div>

</div></td>
  </tr>
</table>

</form>

</body>
</html> 