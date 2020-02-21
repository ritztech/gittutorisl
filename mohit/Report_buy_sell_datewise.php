<?php

include ('sample1_head.php');
include ('sample1_left.php');

include("config.php");

$t_date = date("d/m/Y");


$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'-', `capacity`,'-', `cmp_name`,'-', `storage`,'-',qty)) AS `desc` FROM `m_master_store` order by 2 ";
$result_dispMake=mysql_query($query_dispMake);

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

<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="<?php  echo $t_date = date("d/m/Y"); ?> " />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
	 </tr>
	 <tr>
	 
<td> END DATE </td>

<td> <input id="dend"  name = "dend"   type = "text"  size="15"  value="<?php  echo $t_date = date("d/m/Y"); ?> " />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
</tr>


<tr>

	 
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



$result30 = mysql_query("select sum(sit.qty)
from sell_invoice sin,
sell_items sit,
m_master_store mms
where mms.id = sit.itemid
and sit.billno = sin.billno
and sin.sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')");

$row30 = mysql_fetch_array($result30);


$result31 = mysql_query("select sum(pit.quantity)
from purchase_item pit,
purchase_invoice pin,
m_master_store mms
where mms.id = pit.ited_id
and pit.purchaseid = pin.purchaseid
and pin.p_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')
");



$row31 = mysql_fetch_array($result31);







$result13 = mysql_query("select sin.billno,DATE_FORMAT(sin.sell_date,'%d/%m/%Y'),mms.desc,sum(sit.qty)
from sell_invoice sin,
sell_items sit,
m_master_store mms
where mms.id = sit.itemid
and sit.billno = sin.billno
and sin.sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')
group by sin.billno,sin.sell_date,mms.desc");




$result18 = mysql_query("select pin.purchaseid,DATE_FORMAT(pin.p_date,'%d/%m/%Y') ,mms.desc,sum(pit.quantity)
from purchase_item pit,
purchase_invoice pin,
m_master_store mms
where mms.id = pit.ited_id
and pit.purchaseid = pin.purchaseid
and pin.p_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')
group by pin.purchaseid,pin.p_date,mms.desc");


?>




<form name = "form2" >

</br>
</br>

<div id="purchasecontainer"> 


<table>
<tr>
<td>

<table border='1' cellpadding='1' frame="box"  bgcolor="white"    >
<tr> <th style="text-align:center" colspan="4"  > <font color="blue"> <h4>TOTAL ITEM SOLD : <?php echo  $row30['0'] ?>   </h4> </font> </th>  </tr>
<tr> <th style="text-align:center" colspan="4"  > <font color="blue"> <h4>SALE REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr bgcolor="yellow"  > <th> BILL NO</th> <th> DATE </th>  <th> ITEM NAME  </th> <th> QUANTITY </th>   </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td><font color="#663300"><a href="show_rec_bill.php?id= <?php echo  $row13['0']?> "> <?php echo  $row13['0']?>  </a></font></td>
   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="20" readonly name = "pcust<?php echo   $i ?>" value = "<?php echo  $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "netpay<?php echo   $i ?>" value = "<?php echo  $row13['3'] ?>" />  </td>
    
</tr>
  
<?php  }	?>

</table>

</br>

 <input class = noPrint type = "text" size="10" width="30" name = "totalcnt" id = "totalcnt" value=<?php echo   $i ?> /> 

</td>
<td valign="top">



<table border='1' cellpadding='1' frame="box"  bgcolor="white"    >
<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4>TOTAL ITEM PURCHASED : <?php echo  $row31['0'] ?>   </h4> </font> </th>  </tr>
<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4>PURCHASE REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr bgcolor="yellow"  > <th> BILL NO</th> <th> DATE </th>  <th> ITEM NAME  </th> <th> QUANTITY </th>   </tr> 


<?php
 
$j = 0;
while($row18 = mysql_fetch_array($result18))
  {   $j = $j + 1; ?>
  
 <tr>
   
   <td><font color="#663300"><a href="Report_purchase_show_rec.php?id= <?php echo  $row18['0']?> "> <?php echo  $row18['0']?>  </a></font></td>
   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $j ?>" value = "<?php echo  $row18['1'] ?>" />  </td>
   <td> <input type = "text" size="20" readonly name = "pcust<?php echo   $j ?>" value = "<?php echo  $row18['2'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "netpay<?php echo   $j ?>" value = "<?php echo  $row18['3'] ?>" />  </td>
    
</tr>
  
<?php  }	?>

</table>

</br>

 <input class = noPrint type = "text" size="10" width="30" name = "totalcnt" id = "totalcnt" value=<?php echo   $j ?> /> 

 
 </td></tr></table>
 

   



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