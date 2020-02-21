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



$sql1 = mysql_query("select billno,`cust_name` , `netpay`,`paid`,`balance`,DATE_FORMAT(sell_date,'%d/%m/%Y')   from sell_invoice  where `balance`  > 0 and cust_id = $id order by 1 desc");

$result12 = mysql_query("SELECT `cust_name` , sum(`balance`) as balance from sell_invoice where `cust_id` = $id");
$row12 = mysql_fetch_array($result12);

$cname= $row12['cust_name'];
$tdues= round($row12['balance']);



?>




<form name = "form2" >

</br>
</br>

</br>

<h3 align="center"> PURCHASE DUE REPORT</h3>
</br>

<div  align = "center">
<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/>
</div>
</br>


<div id = "griddiv">

<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"  >
<tr>  <th colspan = 5> TOTAL  Due for <?php echo  $cname  ?>  </th> <td>   <?php echo  $tdues    ?>   </td>   </tr>
<tr style="background-color:#0A5066; color:#F7F5F5;"> 

<th> BILL NO</th> <th> DATE </th>  <th> Customer Name  </th>  <th>Net pay   </th>  <th>  PAID </th><th> Balance  </th>   </tr> 


<?php
 
$i = 0;
		while($row = mysql_fetch_array($sql1))
		{
			  ?>
		  
		     <tr>
		  
			  <td><a   href="show_rec_bill_dues.php?id= <?php echo  $row['0']?> ">    <?php echo  $row['0']?>   </a></td>
			  <td>  <?php echo $row['5']   ?> </td>
			  <td>  <?php echo $row['1']   ?> </td>
			  <td>  <?php echo $row['2']   ?> </td>
			  <td>  <?php echo $row['3']   ?> </td>
			  <td>  <?php echo $row['4']   ?> </td>
			  
			  
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