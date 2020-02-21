<?php

include ('sample1_head.php');
//include ('sample1_left.php');

$t_date = date("d/m/Y");

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

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

 
<form name = "form1"  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>
 <h3 align="center">  SELECT DATE RANGE </h3> 
	  
	 
<table align="center">
<tr>
<td> START DATE </td>

<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="<?php  echo $t_date ?>" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
	 
<td> END DATE </td>

<td> <input id="dend"  name = "dend"   type = "text"  size="15"  value="<?php  echo $t_date ?>"  />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>


	
	 
<td> <input type="submit" name="submit" value="SHOW RECORDS">  </td>

</tr>



</table>
</div>

</form>

<?php

include('config.php');

if(isset($_GET['submit']))
{

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];


$result13 = mysql_query("
SELECT st.billno as bno, DATE_FORMAT(si.sell_date,'%d/%m/%Y') as sell_date, st.qty  as qty1, st.total as alltotal, st.mrp  as mrp1,
 st.sprice  as price11, st.itemname  as itemname_1 ,si.accid as accid,si.retcom  as retcom  FROM sales_item_return st,sales_return_main  si 
where si.billno = st.billno  and si.sell_date between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y')
order by 1 desc");




?>




<form name = "form2" >
</br>

<div  align = "center">
<input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
</div>
</br>

<div id = "griddiv">

<table border='1' cellpadding='1' frame="box"   width = "100%" bgcolor="white" align="center">

<tr> <th style="text-align:center" colspan="15"  > <font color="blue"> <h4>	ITEM RETURN  REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr style="background-color:#0A5066; color:#F7F5F5;"> 

<th>Sno </th>  <th> RETURN NO</th> <th> DATE </th>  <th> ITEM NAME </th>    <th> RETURN REMARK  </th>  <th> MRP </th>   <th> QTY </th> <th> PRICE </th>   <th> TOTAL </th>  </tr> 





<?php
  $cas_Sale = 0;
$card_Sale = 0;

$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td align = "center">  <?php  echo $i ?>  </td>
   <td><font color="#663300"><a href="show_rec_bill_return.php?id= <?php echo  $row13['bno']?> "> <?php echo  $row13['bno']?>  </a></font></td>
   <td> <?php echo  $row13['sell_date'] ?> </td>
    <td> <?php echo  $row13['itemname_1'] ?> </td>
	  <td> <?php echo  $row13['retcom'] ?> </td>
   <td><?php echo  $row13['mrp1'] ?> </td>
   <td><?php echo  $row13['qty1'] ?> </td>
<td> <?php echo  $row13['price11'] ?> </td>
<td> <?php echo  $row13['alltotal'] ?> </td>
    
</tr>
  
<?php  


$c_id_1 = $row13['accid'] ;
if($c_id_1 == 1)
{  $cas_Sale = $cas_Sale + $row13['alltotal'];  }
else
{
	$card_Sale = $card_Sale + $row13['alltotal'] ;  
}


}	?>


 <tr  style="background-color:#0A5066; color:#F7F5F5;" > <td>   </td>   <td>   </td>   <td>   </td>  <td>   </td>  <td>   </td><td>   </td>  <td> CASH : <?php echo $cas_Sale ?>  </td>  <td> CARD : <?php echo $card_Sale ?>  </td>   <td> NET SALE : <?php echo $card_Sale + $cas_Sale ?>  </td> </tr> 

 

</table>

</div>


</br>

  



</div>






</div>
</div>
</div>
<script>
//window.onload=happycode ; 

 document.form1.dstart.value = "<?php echo $st_1  ?>" ;
  document.form1.dend.value = "<?php echo $end_1  ?>" ;
  
 document.form2.btnprint.focus();
  

</script>

</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 