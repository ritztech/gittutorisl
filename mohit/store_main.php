<?php

include('config.php');
include ('sample1_head.php');

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />



</head>

<body>
 
<form  name = "form1" action = "add_new_order_bck.php"  method = "post" >


<font color="blue"> <h3 align="center"> ALL STORE MASTERS </h3>  </font> 


<table cellspacing="5" cellpadding="2" border="2" align="center" >

<tr>  <td> <b><INPUT class = "subbuttonmenu"   Type="BUTTON" VALUE="STORE MASTER" ONCLICK="window.location.href='add_store_item.php'"> </b></br></br>   </td> </tr>
<tr>  <td> <b><INPUT class = "subbuttonmenu"   Type="BUTTON" VALUE="PURCHASE ENTRY" ONCLICK="window.location.href='add_store_f.php'"> </b></br></br>   </td> </tr>

</table>


<font color="blue"> <h3 align="center"> STORE REPORTS </h3>  </font> 


<table cellspacing="5" cellpadding="2" border="2" align="center" >

<tr>  <td> <b><INPUT class = "subbuttonmenu"   Type="BUTTON" VALUE="PURCHASE DATE WISE" ONCLICK="window.location.href='Report_purchase_date.php'"> </b></br></br>   </td> </tr>
<tr>  <td> <b><INPUT class = "subbuttonmenu"   Type="BUTTON" VALUE="ITEM USAGE DATE WISE" ONCLICK="window.location.href='Report_store_datewise.php'"> </b></br></br>   </td> </tr>

</table>







</div>

</div>
</form>

</body>
</html> 