<?php

include ('sample1_head.php');
//include ('sample1_left.php');
$t_date = date("d/m/Y");





?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

</head>

<body>
<div class = "head1" >



 
<form name = "form1"  method="get"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>





    <font color="blue"> <h3 align = "center">  SELECT DATE RANGE </h3> </font>
	  
	 
<table align = "center">
<tr>
<td> START DATE </td>

<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="<?php echo  $t_date  ?>"  />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
	 
<td> END DATE </td>

<td> <input id="dend"  name = "dend"   type = "text"  size="15"  value="<?php echo  $t_date  ?>"  />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>


	
	 
<td> <input type="submit" name="submit"  autofocus  value="SHOW RECORDS">  </td>

</tr>



</table>


</form>

<?php

include('config.php');

if(isset($_GET['submit']))
{

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];

$result13 = mysql_query("SELECT DATE_FORMAT(p_date,'%d/%m/%Y')   as  sdate, `vendor_id`, `p_receipt`, `total`, `p_notes`, `user_ent`, `vendname`, `purchaseid` 
FROM `stock_p_invoice` WHERE 
p_date between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y') order by 1 desc");





?>




<form name = "form2"   >

</br>


<table border='1' cellpadding='1'   align = "center"frame="box"  bgcolor="white"    >

 
<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4>STOCK PURCHASE REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr bgcolor="orange"  > <th> SNO </th>  <th> RECEIPT NO </th>  <th> DATE </th>  <th> VENDOR  </th> <th> NET PURCHASE  </th>  </tr> 


<?php
 
$i = 0;
$n_tot_z = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td>  <?php  echo $i;  ?>  </td>
   <td><font color="#663300"><a href="Report_purchase_show_rec.php?id= <?php echo $row13['purchaseid']?> "> <?php echo  $row13['p_receipt']?>  </a></font></td>
   <td>  <?php echo  $row13['sdate'] ?> </td>
   <td> <?php echo  $row13['vendname'] ?>  </td>
   <td align = "right"> <?php echo  $row13['total'] ?>  </td>
    
</tr>


   
<?php 

$n_tot_z = $n_tot_z + $row13['total'];

 }	?>
 
 <tr>  <td  colspan = "5" align = "right"><b> Total : <?php  echo $n_tot_z ?>  </b> </td> </tr>



</table>

</br>
</br>



</div>
</div>


</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 