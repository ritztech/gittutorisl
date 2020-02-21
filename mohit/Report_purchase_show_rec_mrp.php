<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

$id = $_GET['id'];


$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';


 




$result1 = mysql_query("SELECT `purchaseid`, DATE_FORMAT(p_date,'%d/%m/%Y') as sell_date, `vendor_id`, `p_receipt`, `total`, `p_notes`, `user_ent`,
 `vend_name` FROM `purchase_invoice` WHERE purchaseid = $id");
 
$row1 = mysql_fetch_array($result1);


$result13 = mysql_query("SELECT `purchaseid`, `ited_id`, `itemname`, `mrp`, `sell_price`, `buy_price`, `buy_qty`, 
DATE_FORMAT(expiry_date,'%d/%m/%Y') as expiry_date , `batchno`, `total`, 
`barcode`, `gruop_id` FROM `purchase_item` WHERE   purchaseid  =  $id");


 

 


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="/css/try.css" />

<script language="javascript" type="text/javascript" >
function jumpto(){

						document.getElementById("printtable").deleteRow(0);
			
			window.location='<?php echo  $refering_url  ?>';
			window.print();
	
}

function closeMe()
{

//document.location.href = "Report_today_sell.php";
window.location='<?php echo  $refering_url  ?>';

}


</script>

</head>

<body>
<div class = "head1" >


<form name = "form2" >



</br>
</br>

<div  align = "center">  STOCK PURCHASE DETAILS   </div>

<table border='1' cellpadding='1' frame="box" align = "center"  id = "printtable"  >

<tr>
<td>  <input type="button" name="btnprint" value="Print" onclick="jumpto()"/>  </td>

<td> <input type="button" name="CloseMe" value="Close Me" onClick="closeMe()"/> </td>
</tr>

<tr> <td colspan = 6 align = "center">  Vendor name : <?php  echo $row1[vendname] ?>  *****Purchase date : <?php  echo $row1[sell_date] ?>  *****  Receipt/Voucher: <?php  echo $row1[p_receipt] ?> ****  Total: <?php  echo $row1[total] ?> </td>   </tr>


<tr>  <td colspan = 6 align = "center">***** PURCHASE ITEM DETAILS   ***** </td>  </tr>

<tr> <th> SNO  </th> <th> ITEM NAME </th>  <th> UNIT  </th> <th> QTY </th>  <th> Buy Price </th> <th> TOTAL </th>   </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td> <?php echo $i ?>  </td>
   <td> <?php echo  $row13['itemname'] ?> </td>
   <td> <?php echo  $row13['itemunit'] ?> </td>
   <td> <?php echo  $row13['quantity'] ?> </td>
   <td> <?php echo  $row13['purchase_price'] ?> </td>
   <td> <?php echo  $row13['indiv_tot'] ?> </td>
     
 
</tr>


   
<?php  }	?>



</table>




</form>



</div>


</body>
</html> 