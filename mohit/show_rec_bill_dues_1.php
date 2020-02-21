<?php

include ('sample1_head.php');
//include ('sample1_left.php');

include('config.php');


$id = $_GET['id'];

$result1 = mysql_query("SELECT `billno`, DATE_FORMAT(sell_date,'%d/%m/%Y'), `total`, `discount`, `netpay`, `cust_name`, `dis_rs`, `cust_con`, `cash_card`, `cust_id`, `salesman_id`, `sales_name`, `paid`, `balance` FROM `sell_invoice`  WHERE `billno` = $id");
$row1 = mysql_fetch_array($result1);



$result_due = mysql_query("SELECT `billno`, DATE_FORMAT(pdate,'%d/%m/%Y') as pdate, `paid`, `dues`, `net_amt` FROM `due_hstry` WHERE   billno = $id order by did desc");

$result13 = mysql_query("SELECT `qty`, `total`, `mrp`, `itemname`, `s_type`, `size`, `discount`, `dispr` FROM `sell_items`   where billno  = $id");



?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>



</head>

<body>

</br>
</br>

<form name = "form2" method="post" action="show_rec_bill_dues_bck.php">


<td> <input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>  </td>


Get Payment : <input type = "text" size="10" name = "getpay" id = "getpay" value = "0" />
<input type='submit' value='SAVE' />


<div id = "griddiv">


<table  cellpadding='1' frame='box' bgcolor='white' border = '1'>
<tr>
<th style="text-align:center" colspan="12"  ><h3>RITZ  STORE</h3> 
<pre>Gwalior </pre>
</th>
</tr>

<tr>   <td style="text-align:left" colspan="1"  > Name: </td> <td style="text-align:left"   > <?php echo  $row1['11']?> </td> 
 <td style="text-align:left" colspan="1"  > Bill no: </td> <td style="text-align:left" colspan="2"  > <?php echo $id?> </td>  
<td style="text-align:left" colspan="2"  > DATE: </td> <td style="text-align:left" colspan="3"  > <?php echo $row1['1']?></td>  
  </tr>

	

<tr>  <td> Customer Name  </td> <td>  <?php echo $row1['cust_name']?>    </td> <td > Total : </td> <td> <?php echo $row1['total']?> </td>    
  </tr>

<tr style = "background-color:yellow";>  <td> Net : <input type = "text" size="10" readonly name = "npay" id = "npay" value = "<?php echo $row1['netpay']?>" />    </td><td colspan = 2> 
Paid: <input type = "text" size="10" name = "ppaid" readonly id = "ppaid" value = "<?php echo $row1['paid']?>" /> </td>
<td colspan = 2>  Balance : <input type = "text" readonly  size="10" name = "balance" id = "balance" value = "<?php echo $row1['balance']?>" /> </td>   </tr>

<tr> <th> SNo. </th> <th> ITEM NAME   </th><th>MRP</th> <th>Size</th><th>QTY</th> <th>Dis Rs</th> <th>Dis %</th> <th>TOTAL</th>   </tr>



<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td>  <?php echo  $i ?>  </td>
   <td > <?php echo  $row13['itemname'] ?> </td>
   <td> <?php echo  $row13['mrp'] ?> </td> 
   <td> <?php echo  $row13['size'] ?> </td>
   <td> <?php echo  $row13['qty'] ?> </td>
      <td><?php echo  $row13['discount'] ?>  </td>
	   <td><?php echo  $row13['dispr'] ?>  </td>
	   <td><?php echo  $row13['total'] ?>  </td>

</tr>
  
<?php  }	?>


<tr>    <td colspan = 12  align = "right" > (Total :<?php echo $row1['total']?>)  +  
                                                    (Dis % :<?php echo $row1['discount']?> )  -
						 (Dis Rs. :<?php echo $row1['dis_rs']?> )   = 
						  NET AMOUNT : <?php echo $row1['netpay']?></td> </tr>



<tr>  <td colspan = 10 , align = "center"> *** Payment history ****  </td> </tr>

<tr> <th> Billno. </th> <th> Payment Date   </th><th >Net AMount</th><th>PAID</th> <th>BALANCE</th> </tr>

<?php
 
$i = 0;
while($row_due = mysql_fetch_array($result_due))
  {   $i = $i + 1; ?>
  
 <tr>
   <td>  <?php echo  $row_due['billno'] ?>  </td>
   <td>  <?php echo  $row_due['pdate'] ?>  </td>
   <td>  <?php echo  $row_due['net_amt'] ?>  </td>
   <td>  <?php echo  $row_due['paid'] ?>  </td>
    <td>  <?php echo  $row_due['dues'] ?>  </td>

    
</tr>
  
<?php  }	?>
						  
</table>
</div>

 


<input type = "hidden" size="10" name = "billno" id = "billno" value = "<?php echo $id ?>" /> 

</br>



</div>

</br>








</form>




</div>
</div>


</body>
</html> 