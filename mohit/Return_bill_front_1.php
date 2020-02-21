<?php

include ('sample1_head.php');
include ('sample1_left.php');


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>



</head>

<body>
<div class = "head1" >
<div class = "center_page">


 
<form name = "form1"  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


<div id="p1itemcontainer"> 


	<div class="empleftDiv">
	
</br>	




	 
<table>
<tr>
<td> Enter Bill no</td>

<td> <input id="billno"  name = "billno"   type = "text"  size="15"   />  </td>
	 

	 
<td> <input type="submit" name="submit" value="SHOW RECORDS">  </td>

</tr>



</table>
</div>
</div>
</form>

<?php

include('config.php');

if(isset($_GET['submit']))
{

$id = $_GET['billno'];

$result1 = mysql_query("SELECT `billno`, DATE_FORMAT(sell_date,'%d/%m/%Y') , `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name` 
FROM `sell_invoice` WHERE   `billno` = $id");

$row1 = mysql_fetch_array($result1);


$result13 = mysql_query("select m_master_store.desc, DATE_FORMAT(m_master_store.exp_date,'%d/%m/%Y'),m_master_store.s_price,sell_items.qty,sell_items.total,
m_master_store.capacity,sell_items.batchno from m_master_store,sell_items  where m_master_store.id = sell_items.itemid
and sell_items.billno  = $id");


?>




<form name = "form2" >

<td> <input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>  </td>


<div id = "griddiv">


<table border="2" style="width:30%;"    >
<tr>
<th style="text-align:center" colspan="6"  ><h3>ABC PHARMA MEDICAL STORE </h3> 
<pre> Shop no 1 /2 some biluding , some block and address
      Pune pin code -- 7987700700   </pre>
</th>
</tr>




<tr> <td style="text-align:left" colspan="1"  > Bill no: </td>

<td style="text-align:left" colspan="1"  > <?php echo $id?> </td> 
 <td style="text-align:left" colspan="1"  > Customer Name: </td>

 

 
<td style="text-align:left" colspan="2"  > <?php echo  $row1['5']?> </td> </tr>

<tr> <td style="text-align:left" colspan="1"  > Dr Name: </td>

<td style="text-align:left" colspan="1"  > <?php echo $row1['8']?> </td> 
 <td style="text-align:left" colspan="1"  > DATE: </td>

<td style="text-align:left" colspan="2"  > <?php echo $row1['1']?></td> </tr>



<tr> <th>Drug Name</th><th>Batch No</th> <th>Expiry</th><th>Quantity</th> <th>Price</th> </tr>


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $i ?>" value = "<?php echo  $row13['0'] ?>" />  </td>
   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $i ?>" value = "<?php echo  $row13['6'] ?>" />  </td> 
   <td> <input type = "text" size="20" readonly name = "pcust<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "netpay<?php echo   $i ?>" value = "<?php echo  $row13['3'] ?>" />  </td>
      <td> <input type = "text" size="15" readonly name = "netpay<?php echo   $i ?>" value = "<?php echo  $row13['2'] ?>" />  </td>
	  
    
</tr>
  
<?php  }	?>











<tr>
<th style="text-align:center" colspan="5"  > 
<pre>                           NET AMOUNT : <?php echo $row1['4']?>  </pre>
</th>
</tr>

</table>

</div>

</br>








</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 