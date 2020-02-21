<?php

include ('sample1_head.php');


?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />



</head>

<body>
 
<form  name = "form1" >

<h3 align="center"> ALL MASTERS </h3>  


<table cellspacing="5" cellpadding="2" border="2" align="center" style="text-align:center;">


<tr>  <td> <b><INPUT class = "btn"   style="width:100%;"  Type="BUTTON" VALUE="INVENTORY" ONCLICK="window.location.href='Report_inv.php'"> </b></br></br>   </td> 
 <td> <b><INPUT class = "btn"   style="width:100%;"  Type="BUTTON" VALUE="STORE MASTER" ONCLICK="window.location.href='store_main.php'"> </b></br></br>   </td> <td> <b><INPUT class = "btn"   style="width:100%;"  Type="BUTTON" VALUE="CATEGORY MASTER" ONCLICK="window.location.href='add_color.php'"> </b></br></br>   </td> </tr>

<tr>  <td> <b><INPUT class = "btn" style="width:100%;"  Type="BUTTON" VALUE="PRINT BARCODES" ONCLICK="window.location.href='purchase_add_front_barcode.php'"> </b></br></br>  


 </td>


<td> <b><INPUT class = "btn"    Type="BUTTON" VALUE="FIX DUPLICATE BARCODE" ONCLICK="window.location.href='fix_barcode_duplicate.php'"> </b></br></br>   </td>

 </tr>




<tr>   
<td> <b><INPUT class = "btn" style="width:100%;"  Type="BUTTON" VALUE="CUSTOMERS" ONCLICK="window.location.href='all_cust_rec_customer_n.php'"> </b></br></br>   </td> 
 <td> <b><INPUT class = "btn" style="width:100%;"  Type="BUTTON" VALUE="ADD SALESMAN" ONCLICK="window.location.href='add_salesman_front.php'"> </b></br></br>   </td> </tr>


<tr>  <td> <b><INPUT class = "btn" style="width:100%;"  Type="BUTTON" VALUE="VENDORS" ONCLICK="window.location.href='all_cust_rec_vend.php'"> </b></br></br>   </td> 
 <td>
<?php
if($_SESSION['auth'] == "NORMAL")
{
 ?>
 <b><INPUT class = "btn" style="width:100%;"  Type="BUTTON" VALUE="USER MASTER" ONCLICK="window.location.href='add_user_front.php'"> </b></br></br>   
 
 <?php
}
?>
 </td> 
 
 <td> <b><INPUT class = "btn" style="width:100%;"  Type="BUTTON" VALUE="VOUCHER" ONCLICK="window.location.href='voucher_f.php'"> </b></br></br>   </td>
 
 </tr>


</table>

</div>

</div>
</form>

</body>
</html> 