<?php

include ('sample1_head.php');
include ('sample1_left.php');


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>


<script language="javascript">


function happycode(){



var tsell =  document.form2.tsale.value;
var tpur =  document.form2.tpurchase.value;
var toth =   document.form2.totherexp.value;

document.form2.tnetprof.value = Number(tsell) - Number(tpur) - Number(toth);
}

</script>














</head>

<body>
<div class = "head1" >
<div class = "center_page">


 
<form name = "form1"  method="get"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


<div id="p1itemcontainer"> 


	<div class="empleftDiv">
    <font color="blue"> <h3>  SELECT DATE RANGE </h3> </font>
	  
	 
<table>
<tr>
<td> START DATE </td>

<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
	 
<td> END DATE </td>

<td> <input id="dend"  name = "dend"   type = "text"  size="15"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>


	
	 
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

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];

$result1 = mysql_query("select sum(`netpay`) from sell_invoice   where sell_date between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')");
$row1 = mysql_fetch_array($result1);


$result2 = mysql_query("SELECT sum(`total`) FROM `purchase_invoice` where p_date between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')");
$row2 = mysql_fetch_array($result2);


$result3 = mysql_query("SELECT sum(`exp_amount`)  FROM `other_expense` WHERE   exp_date between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')");
$row3 = mysql_fetch_array($result3);

mysql_close($dbConn);

 

?>




<form name = "form2"   >

</br>
</br>

<div id="purchasecontainer"> 

</br>
</br>
</br>

<table border='1' cellpadding='1' frame="box"   >

<tr> <th style="text-align:center" colspan="4"  > <font color="blue"> <h3>NET PROFIT RECORDS BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h3> </font> </th>  </tr>
<tr> <th> TOTAL SALE </th> <th> TOTAL PURCHASE </th>  <th> TOTAL OTHER EXP  </th> <th> <font color="green"> NETPROFIT </font>  </th>    </tr> 
  
 <tr>
   <td> <input type = "text" size="15" readonly name = "tsale" value = "<?php echo  $row1[0] ?>" />  </td>
   <td> <input type = "text" size="25" readonly name = "tpurchase" value = "<?php echo  $row2[0] ?>" />  </td>
   <td> <input type = "text" size="25" readonly name = "totherexp" value = "<?php echo  $row3[0] ?>" />  </td>
   <td> <input type = "text" size="12" readonly name = "tnetprof" value = "0" />  </td>
</tr>

</table>

</br>


</div>
</div>
</div>
</div>

<script>
window.onload=happycode ; 
</script>

</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 