<?php

include ('sample1_head.php');

include('config.php');


$id = $_GET['id'];




$result1 = mysql_query("SELECT `billno`, DATE_FORMAT(sell_date,'%d/%m/%Y'), `total`, `dis_pr`, `netpay`, `dis_rs`, `t_cash`, `t_card`, `t_sodexo`, `balance`, cust_name,paid,balance FROM `sell_invoice` , doc_master  WHERE  `billno` = $id");


$row1 = mysql_fetch_array($result1);


$result13 = mysql_query("select sell_items.itemname, sell_items.mrp,sell_items.qty,sell_items.total,
sell_items.sprice from sell_items  where  sell_items.billno  = $id");


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>



</head>

<body>


<form name = "form2" >
<br>

<table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td><input type="button" class="btn" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/></td>
    </tr>
  </tbody>
</table>

   
<div id = "griddiv">


<table border="2" style="width:30%;" align="center"    >
<tr>
<th style="text-align:center" colspan="8"  ><h3>KHANDELWAL DEPARTMENTAL</h3> 
<pre>P-5 BEHIND S.P OFFICE CITY CENTER , GWALIOR 
      CONTACT : 0751 2232548   </pre>
</th>
</tr>

<tr>  <td colspan = "4", align = "center"> Net : <?php echo $row1['4']?>  Paid :<?php echo $row1['paid']?> Balance :<?php echo $row1['balance']?>   </td>   </tr>  
<tr> <td style="text-align:left" colspan="1"  > Bill no: </td> <td style="text-align:left" colspan="1"  > <?php echo $id?> </td> 
 <td style="text-align:left" colspan="1"  > Customer Name: </td> <td style="text-align:left" colspan="4"  > <?php echo  $row1['10']?> </td> </tr>

<tr>  <td style="text-align:left" colspan="2"  > DATE: </td> <td style="text-align:left" colspan="4"  > <?php echo $row1['1']?></td> </tr>



<tr> <th>Item Name</th><th>MRP</th> <th>Price</th><th>QTY</th> <th>TOTAL</th>   </tr>

<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td> <?php echo  $row13['0'] ?> </td>
   <td> <?php echo  $row13['1'] ?> </td> 
   <td> <?php echo  $row13['4'] ?> </td>
   <td> <?php echo  $row13['2'] ?> </td>
      <td><?php echo  $row13['3'] ?>  </td>

	  
    
</tr>
  
<?php  }	?>



<tr>
<th style="text-align:center" colspan="8"  > 

<pre>     CASH :<?php echo $row1['6']?> *** CARD :<?php echo $row1['7']?> ***  SODEXO :<?php echo $row1['8']?>      CREDIT : <?php echo $row1['9']?> </pre>
<pre>     Total :<?php echo $row1['2']?> *** Dis % :<?php echo $row1['3']?> ***  Dis Rs. :<?php echo $row1['5']?>              NET AMOUNT : <?php echo $row1['4']?> </pre>
</th>
</tr>

</table>

</div>

</br>








</form>




</div>
</div>
</div>


</body>
</html> 