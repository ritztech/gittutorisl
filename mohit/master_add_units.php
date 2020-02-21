<?php

include ('sample1_head.php');
include("config.php");

?>
<html>

<body>
 
<form  name = "form1" action = "master_add_units_bck.php"  method = "post" >


<font color="blue"> <h3 align="center"> ADD NEW UNIT  </h3>  </font> 


<table width="40%" cellspacing="5" cellpadding="2" border="2" align="center" >

<tr> <td width="20%" > UNIT NAME:  </td>  <td width="2%" > <input type = "text" size="40"  autocomplete = "off"  required = "required"  name = "desc" id = "desc"/> </td>   </tr>
 <tr> <td  style="text-align:center" colspan="2"  > <input type='submit' value='SAVE' />  </td>   </tr>

</table>


<table border='1' cellpadding='3' align="center" >
<tr>
<tr> <th ><span class="style1"> AVAILABLE UNITS:  </span></th>  
 
</tr>

<?php
$result13 = mysql_query("SELECT `name` FROM `store_units`  ");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <?php echo $row13['0'] ?></td>	

</tr>

 <?php  }	?>
</table>


</div>
</div>
</form>

<script>
window.onload=document.form1.desc.focus();
</script>

</body>
</html> 