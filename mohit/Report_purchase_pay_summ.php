<?php

include ('sample1_head.php');
//include ('sample1_left.php');


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

<script language="javascript">

</script>



</head>

<body>

<?php

include('config.php');

$id = $_GET['id'];



$t_date = date("d/m/Y");



$sql_custpay=mysql_query("SELECT `pay_id`, `cust_id`, `cust_name`, `amount`, `remark`, DATE_FORMAT(p_date,'%d/%m/%Y') as p_date FROM `cust_pay` WHERE `cust_id` = $id");

$result12 = mysql_query("SELECT `cust_name` , sum(`amount`) as ret_net from cust_pay  where `cust_id` = $id");
$row12 = mysql_fetch_array($result12);

$cname= $row12['cust_name'];
$tdues= round($row12['ret_net']);





?>




<form name = "form2" >

</br>
</br>

</br>

<h3 align="center"> CUSTOMER PAYMENT  REPORT</h3>
</br>

<div  align = "center">
<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/>
</div>
</br>


<div id = "griddiv">

<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"  >
<tr>  <th colspan = 2> TOTAL  AMOUNT RECEIVED FROM  <?php echo  $cname  ?>  </th> <td>   <?php echo  $tdues    ?>   </td>   </tr>
<tr style="background-color:#0A5066; color:#F7F5F5;"> 

		<th>Name</th> 
		<th>Date</th>
		<th>Amount</th>
		
		</tr> 


<?php
 
$i = 0;
		while($row1 = mysql_fetch_array($sql_custpay))
		{
			  ?>
		  
		     <tr>
		  
			  <td> <?php echo  $row1['cust_name']?>  </td>
			  <td>  <?php echo $row1['p_date']   ?> </td>
			  <td>  <?php echo $row1['amount']   ?> </td>

					  
			  
			</tr>
			
			<?php  }	?>
			
			

</table>

</br>

</div>


</div>






</div>
</div>
</div>

</form>



</div>
</div>
</div>


</body>
</html> 