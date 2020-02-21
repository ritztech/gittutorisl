<?php

include ('sample1_head.php');

include("config.php");

$query_cust="SELECT `id`,upper(name) AS `name` FROM store_units ";
$result_cust=mysql_query($query_cust);


?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/tabenter.js">  </script>

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<script language="javascript">

function myFunction()
{
	
	

if( document.form1.iunit.value == "0" )
   {
     alert( "Please choose a unit!" );
     document.form1.iunit.focus() ;
     return false;
   }
   
   if( document.form1.itemname.value == "" )
   {
     alert( "Please enter item name!" );
     document.form1.itemname.focus() ;
     return false;
   }
   
   
   
   document.getElementById("form1").submit();
    
   
return true
	

	
}


</script>

</head>

<body>
 
<form  name = "form1" id = "form1" action = "add_store_item_bck.php"  method = "post" >

<font color="blue"> <h3 align="center"> ADD NEW ITEM  </h3>  </font> 


<p align="center">
<a href="master_add_units.php" style="color:#F00; font-size:22px;">ADD UNIT</a></p>


<table   border="2" align="center" >

<tr> <td  > DESCRIPTION:  </td>  <td > <input type = "text" size="40" value = ""  autofocus  name = "itemname" onkeydown="ModifyEnterKeyPressAsTab(event);" id = "itemname"/> </td>   </tr>
  <tr>
    <td>UNIT</td>  <td> <select name = "iunit"   style="width:150px"  >
	<option   value="0" selected="selected"> </option>
	<?php 

	while($query1_data = mysql_fetch_array($result_cust)){
	 
	 echo"<option value = {$query1_data['1']}>{$query1_data['1']}</option>"; 

	 }
	 ?> </select> 
	 </td>
  </tr>
  
  <tr> <td  style="text-align:center" colspan="2"  >    <input type="button" style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()" value="SAVE"   />    </td>   </tr>
  
</table>


<input type = "hidden" size="10"   value = "0" name = "qty" id = "qty"/> 


</br>
</br>


<table border='1' cellpadding='3' align="center" >
<tr>
<tr> <th bgcolor="#0000FF"><span class="style1"> ITEM NAME:  </span></th> 
<th bgcolor="#0000FF"><span class="style1"> QTY  </span></th>  
<th bgcolor="#0000FF"><span class="style1"> UNIT NAME  </span></th>  
<th bgcolor="#0000FF"><span class="style1"> EDIT  </span></th>  
</tr>

<?php
$result13 = mysql_query("SELECT `itemid`, `itemname`, `qty`, `itemunit` FROM `m_item_store` order by 1 desc  ");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td bgcolor="#FFFFFF"> <?php echo $row13['1'] ?></td>	
<td bgcolor="#FFFFFF"> <?php echo $row13['2'] ?></td>
<td bgcolor="#FFFFFF"> <?php echo $row13['3'] ?></td>	

<td bgcolor="#FFFFFF"><b><font color="#663300"><a href="edit_store.php?id=<?php echo $row13['0']?>">EDIT</a></font></b></td>
</tr>

 <?php  }	?>
</table>

</div>



</br>



</form>



</body>
</html> 