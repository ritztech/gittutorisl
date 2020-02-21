<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

$id = $_GET['id'];


$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';







$result1 = mysql_query("SELECT DATE_FORMAT(p_date,'%d/%m/%Y') as sell_date, `vendor_id`, `p_receipt`, `total`, `p_notes`, `user_ent`, `vendname`, `purchaseid` FROM `stock_p_invoice`
 WHERE purchaseid = $id");
 
$row1 = mysql_fetch_array($result1);


$result13 = mysql_query("SELECT `purchaseid`, `ited_id`, `quantity`, `purchase_price`, `indiv_tot`, `itemname`, `itemunit` 
FROM `stock_p_items`  where   purchaseid =  $id");

 


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

<tr> <td colspan = 6 align = "center" style="font-weight:bold; color:white; background-color:black;"> 


 Vendor name : <?php  echo $row1[vendname] ?>  *****Purchase date : <?php  echo $row1[sell_date] ?>  *****  Receipt/Voucher: <?php  echo $row1[p_receipt] ?> ****  Total: <?php  echo $row1[total] ?> </td>   </tr>


<tr>  <td colspan = 6 align = "center">***** PURCHASE ITEM DETAILS   ***** </td>  </tr>

<tr> <th> SNO  </th> <th> ITEM NAME </th>  <th> UNIT  </th> <th> QTY </th>  <th> Buy Price </th> <th> TOTAL </th>   </tr> 


<?php
 $sum=0;
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1;
$sum=$sum + $row13['indiv_tot'];
 ?>
  
 <tr>
   <td> <?php echo $i ?>  </td>
   <td> <?php echo  $row13['itemname'] ?> </td>
   <td> <?php echo  $row13['itemunit'] ?> </td>
   <td> <?php echo  $row13['quantity'] ?> </td>
   <td> <?php echo  $row13['purchase_price'] ?> </td>
   <td> <?php echo  $row13['indiv_tot'] ?> </td>
     
 
</tr>


   
<?php  }	?>

<tr><th colspan="5" align="right"> TOTAL </th>  <th align="right" >  <?php echo $sum; ?> /-</th>   </tr> 


</table>




</form>



</div>


</body>
</html> 