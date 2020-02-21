<?php

include ('sample1_head.php');

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

<script language="javascript">


function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	
	
 
 function deleterecord_1(refid) {
	 
 
 var scr1= "delete_rec_1.php";
	

    if (confirm("Are you sure you want to delete this item ...  ?!") == true) {
		
		
	     	var strURL=scr1+"?id="+refid;
			
		//	var strURL="scr1?id="+deleteId;
			
			
		//	alert(strURL);
			
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	location.reload(); 
	
	
	} else {
        x = "You pressed Cancel!";
    }
	


				 
}



</script>





</head>

<body>

<?php

include('config.php');


$t_date = date("d/m/Y");





$result13 = mysql_query("SELECT DATE_FORMAT(sell_date,'%d/%m/%Y') as selldate3, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, 
`salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno` FROM `sell_invoice` WHERE sell_date  = STR_TO_DATE('$t_date','%d/%m/%Y')
order by  billno desc");


$result14 = mysql_query("SELECT DATE_FORMAT(sell_date,'%d/%m/%Y') as selldate3, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, 
`salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno` FROM `sales_return_main` WHERE sell_date  = STR_TO_DATE('$t_date','%d/%m/%Y')
order by  billno desc");


$result1_c = mysql_query("SELECT count(1) FROM `sales_return_main` WHERE sell_date  = STR_TO_DATE('$t_date','%d/%m/%Y')");

 
$row_c = mysql_fetch_array($result1_c);

$all_ret = $row_c['0'];

//echo $all_ret;











?>




<form name = "form2" >

</br>


<h3 align="center"> TODAY SALE REPORT</h3>
</br>

<p align="center">  <input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/></p> 

<div id = "griddiv">


<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center" width="100%"  >
<tr> <th style="text-align:center" colspan="8"  > <font color="blue"> <h4>SALE REPORT FOR  <?php echo  $t_date ?>     </h4> </font> </th>  </tr>
<tr> <th> SNO</th> <th> BILL NO</th> <th> DATE </th>   <th> NET BILL </th> <th> CASH </th>  <th> CARD </th> <th> CHQ./PAYTM </th>  <th> CREDIT </th> <?php  if($_SESSION['auth'] == "ADMIN") {  ?> <th> DELETE </th> <?php  } ?> </tr> 

<?php
 $cas_Sale = 0;
 
$card_Sale = 0;

$chk_Sale = 0;

$credit_Sale = 0;

$net_selll = 0;

$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1;



$acc_id_1 = $row13['accid'];

if($acc_id_1 == 1) {  $cash_card_1 = "CASH";}
if($acc_id_1 == 2) {  $cash_card_1 = "CARD";}
if($acc_id_1 == 1774) {  $cash_card_1 = "CHQ";}


 ?>
  
 <tr>
   <td>  <?php    echo $i   ?> </td>
   <td><font color="#663300"><a href="show_rec_bill.php?id= <?php echo  $row13['billno']?> "> <?php echo  $row13['billno']?>  </a></font></td>
   <td> <?php echo  $row13['selldate3'] ?>  </td>
    <td> <?php echo  $row13['netpay'] ?>  </td>
   <td> <?php if($acc_id_1 == 1) {echo  $row13['paid']; }?> </td> 
   <td> <?php if($acc_id_1 == 2) {echo  $row13['paid']; } ?> </td>
   <td> <?php if($acc_id_1 == 1774) {echo  $row13['paid']; } ?> </td>
      <td> <?php echo  $row13['balance']; ?> </td>
   <?php  if($_SESSION['auth'] == "ADMIN") {  ?>   <td><input type='button' name='btnprint' value='Delete' onclick='deleterecord_1("<?php echo  $row13['billno']  ?>")'/></td>  <?php  } ?> 
   
</tr>
  
<?php

$credit_Sale = $credit_Sale + $row13['balance']; 

$net_selll = $net_selll + $row13['netpay']; 




$c_id_1 = $row13['accid'] ;
if($c_id_1 == 1)
{  $cas_Sale = $cas_Sale + $row13['paid'];  }
else  if($c_id_1 == 2)
{
	$card_Sale = $card_Sale + $row13['paid'] ;  
}

else  if($c_id_1 == 1774)
{
	$chk_Sale = $chk_Sale + $row13['paid'] ;  
}




  }
  
  $s_cas_Sale = $cas_Sale;
$s_card_Sale = $card_Sale;
$s_net_amt = $card_Sale + $cas_Sale + $chk_Sale;



  ?>
  
  
 <tr> <td colspan = "7" align = "right">NET SELL : <?php echo $net_selll ?> *** CASH : <?php echo $cas_Sale ?>  --  CARD : <?php echo $card_Sale ?> -- CHQ/PAYTM : <?php echo  $chk_Sale ?> **** NET RECEIVED : <?php echo $s_net_amt ?>  *** NET Credit : <?php echo $credit_Sale ?>  </td>  </tr> 

</table>


<?php 

if($all_ret > 0)

{
?>

<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center" width="100%"  >
<tr> <th style="text-align:center" colspan="7"  > <font color="blue"> <h4>RETRUN REPORT FOR  <?php echo  $t_date ?>     </h4> </font> </th>  </tr>
<tr> <th> SNO</th> <th> RETURN NO</th> <th> DATE </th> <th> CASH/CARD </th>  <th> NETPAY </th>    </tr> 

<?php
 $cas_Sale = 0;
 
$card_Sale = 0;
$i = 0;
while($row13 = mysql_fetch_array($result14))
  {   $i = $i + 1;

$acc_id_1 = $row13['accid'];

if($acc_id_1 == 1) {  $cash_card_1 = "CASH";}
if($acc_id_1 == 2) {  $cash_card_1 = "CARD";}
if($acc_id_1 == 1774) {  $cash_card_1 = "CHQ";}


 ?>
  
 <tr>
   <td>  <?php    echo $i   ?> </td>
   <td><font color="#663300"><a href="show_rec_bill_r.php?id= <?php echo  $row13['billno']?> "> <?php echo  $row13['billno']?>  </a></font></td>
   <td> <?php echo  $row13['selldate3'] ?>  </td>
   <td> <?php echo  $cash_card_1 ?> </td>
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



  }


$r_cas_Sale = $cas_Sale;
$r_card_Sale = $card_Sale;
$r_net_amt = $card_Sale + $cas_Sale;
  ?>
  
  
 <tr> <td>   </td>  <td> CASH : <?php echo $cas_Sale ?>  </td>  <td> CARD : <?php echo $card_Sale ?>  </td>   <td> NET RETURN : <?php echo $r_net_amt ?>  </td> <td>   </td> </tr> 
<tr>    <td>  </td>  <td>  </td>  <td align = "center">   NET CASH :(<?php echo $s_cas_Sale - $r_cas_Sale ?>)   </td>   <td align = "center">   NET CARD : ( <?php   echo  $s_card_Sale - $r_card_Sale ?>) </td>   <td align = "left">   NET Amount. : (<?php echo $s_net_amt - $r_net_amt ?>)   </td> </tr>
</table>


<?php } ?>
</div>

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