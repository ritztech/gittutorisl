<?php

include ('sample1_head.php');

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
  
  document.form2.totactcnt.value = j;

}

</script>



</head>

<body>

<?php

include('config.php');


$t_date = date("d/m/Y");





$result13 = mysql_query("SELECT DATE_FORMAT(sell_date,'%d/%m/%Y') as selldate3, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, 
`salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno` FROM `sell_invoice_2` WHERE sell_date  = STR_TO_DATE('$t_date','%d/%m/%Y')
order by  billno desc");







?>




<form name = "form2" >

</br>


<h3 align="center"> TODAY SALE REPORT</h3>
</br>



<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center" width="50%"  >
<tr> <th style="text-align:center" colspan="7"  > <font color="blue"> <h4>SALE REPORT FOR  <?php echo  $t_date ?>     </h4> </font> </th>  </tr>
<tr> <th> SNO</th> <th> BILL NO</th> <th> DATE </th>  <th> NETPAY </th>  </tr> 

<?php

$cas_Sale = 0;
$card_Sale = 0;
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td>  <?php    echo $i   ?> </td>
   <td><font color="#663300"><a href="show_rec_bill1.php?id= <?php echo  $row13['billno']?> "> <?php echo  $row13['billno']?>  </a></font></td>
   <td> <?php echo  $row13['selldate3'] ?>  </td>
   <td> <?php echo  $row13['netpay'] ?> </td>
   
</tr>
  
<?php  

$c_id_1 = $row13['accid'] ;
if($c_id_1 == 1)
{  $cas_Sale = $cas_Sale + $row13['netpay'];  }
else
{
	$card_Sale = $card_Sale + $row13['netpay'] ;  
}




}	?>

 <tr> <td>   </td>  <td> CASH : <?php echo $cas_Sale ?>  </td>  <td> CARD : <?php echo $card_Sale ?>  </td>   <td> NET SALE : <?php echo $card_Sale + $cas_Sale ?>  </td> </tr> 

 

</table>

</br>


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