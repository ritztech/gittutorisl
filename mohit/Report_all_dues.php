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



$sql_custpay=mysql_query("SELECT `id`, `name`, `contact`, `opd`, `p_bal`, `n_bal` FROM `m_customer` WHERE n_bal > 0");



$result12_d = mysql_query("select sum(`n_bal`)  from m_customer");
$row12_d = mysql_fetch_array($result12_d);

$opd = round($row12_d['0'],2);


?>




<form name = "form2" >

</br>


<h3 align="center"> CUSTOMER  DUE PAYMENT  REPORT</h3>

<div  align = "center">
<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/>
</div>
</br>


<div id = "griddiv">

<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"  >
<tr>  <th colspan = 2> TOTAL  AMOUNT DUE :   </th> <td>   <?php echo  $opd    ?>   </td>   </tr>
<tr style="background-color:#0A5066; color:#F7F5F5;"> 

		<th>Name</th> 
		<th>Contact</th>
		<th>Net Due</th>
		
		</tr> 


<?php
 
$i = 0;
		while($row1 = mysql_fetch_array($sql_custpay))
		{
			  ?>
		  
		     <tr>
		  
		       <td> <a   href="Report_dues_date.php?dstart=<?php echo  $row1['id'] ?> ">    <?php echo  $row1['name'] ?>   </a>   </td>
				  <td>  <?php echo $row1['contact']   ?> </td>
			  <td>  <?php echo $row1['n_bal']   ?> </td>

					  
			  
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