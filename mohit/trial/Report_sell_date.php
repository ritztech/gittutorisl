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

var tot = 0;
var j = document.form2.totalcnt.value;

for (var i=1; i<=j; i++)
  {
    

 var val3 = document.form2[ "netpay" + i ].value 
 tot = Number(tot) + Number(val3);
 
 document.form2.alltotal.value = tot;
  }
document.form2.totaactt.value = j;
}

</script>



</head>

<body>
<div class = "head1" >
<div class = "center_page">


 
<form name = "form1"  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

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

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];

$result13 = mysql_query("SELECT billno, DATE_FORMAT(sell_date,'%d/%m/%Y'),cust_name,netpay  from sell_invoice 
WHERE  sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y') order by sell_date");



$result1 = mysql_query("SELECT sum(netpay) FROM `sell_invoice` WHERE   p_type = 'CASH' and sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y') ");
$row1 = mysql_fetch_array($result1);



$result2 = mysql_query("SELECT sum(netpay) FROM `sell_invoice` WHERE   p_type = 'CARD' and sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')");
$row2 = mysql_fetch_array($result2);



?>




<form name = "form2" >

</br>
</br>

<div id="purchasecontainer"> 

</br>

<table  cellpadding='1' frame="box"  bgcolor="white"    >

<tr> <th>  TOTAL RECORDS </th> <td> <input type = "text" size="5" width="30" name = "totaactt" id = "totaactt" />  </td> <th> GRAND TOTAL </th> <td> <input type = "text" size="5" style="font-size:30px;font-weight:bold;color:#CC0000"  width="30" name = "alltotal" id = "alltotal" value = "0"  />  </td>   </tr>



</table>

</br>


<table border='1' cellpadding='1' frame="box"  bgcolor="white"    >

<tr bgcolor="yellow"  > <th> CASH </th>  <th> <?php echo  $row1['0'] ?>   </th> <th> CARD </th>  <th> <?php echo  $row2['0'] ?>  </th>  </tr>
<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4>SALE REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr bgcolor="yellow"  > <th> BILL NO</th> <th> DATE </th>  <th> CUSTOMER  </th> <th> NETPAY </th>   </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td><font color="#663300"><a href="Report_sell_show_rec.php?id= <?php echo  $row13['0']?> "> <?php echo  $row13['0']?>  </a></font></td>
   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="20" readonly name = "pcust<?php echo   $i ?>" value = "<?php echo  $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "netpay<?php echo   $i ?>" value = "<?php echo  $row13['3'] ?>" />  </td>
    
</tr>
  
<?php  }	?>

</table>

</br>

 <input class = noPrint type = "text" size="10" width="30" name = "totalcnt" id = "totalcnt" value=<?php echo   $i ?> /> 





   



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