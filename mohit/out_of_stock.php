<?php

include ('sample1_head.php');
include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>
</head>

<body>
 
<form  name = "form1" action = "add_user_back.php"  method = "post" >
<br>

<input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>

<div id = "griddiv">

<table border='1' cellpadding='3' align="center" >
<tr> <td colspan = 5 , align = "center" >  ITEMS RUNNING SHORT IN STORE   </td>  </tr>
<tr> <th> Item Name  </th> <th> MRP </th> <th> Selling Price  </th> <th> QUANTITY  </th> <th> TRIGGER </tr>

<?php


$result13 = mysql_query("SELECT `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `id` FROM `m_master_store`  WHERE `qty` < `trg`");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <input type = "text" size = "40"  readonly name = "desc" value = "<?php echo  $row13['desc'] ?>"/> </td>
<td> <input type = "text" size = "10" readonly name = "capa" value = "<?php echo  $row13['mrp'] ?>"/> </td>
<td> <input type = "text"  size = "20" readonly name = "exp" value = "<?php echo  $row13['s_price'] ?>"/> </td>
<td> <input type = "text" size = "10"  readonly name = "qty" value = "<?php echo  $row13['qty'] ?>"/> </td>
<td> <input type = "text" size = "10" readonly name = "trg" value = "<?php echo  $row13['trg'] ?>"/> </td>

</tr>

 <?php  }	?>


</table>

</div>




</div>
</div>
</form>

</body>
</html> 