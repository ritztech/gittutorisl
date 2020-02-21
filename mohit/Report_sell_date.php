<?php

include ('sample1_head.php');

$t_date = date("d/m/Y");
?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

<link rel="stylesheet" href="date_picker/jquery-ui.css">
  
  <script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script>
  
    <script>
  $( function() {
    $( "#dstart" ).datepicker();
	$( "#dend" ).datepicker();
	 
	
  } );
  </script>
  


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
	
	
 
 function deleterecord_1(refid,rowtodelete) {
	 
 
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
	 var row = rowtodelete.parentNode.parentNode;
      row.parentNode.removeChild(row);
	//location.reload(); 
	
	
	} else {
        x = "You pressed Cancel!";
    }
	


				 
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

<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="<?php echo  $t_date  ?>"  </td>
	 
<td> END DATE </td>

<td> <input id="dend"  name = "dend"   type = "text"  size="15"  value="<?php echo  $t_date  ?>"  </td>


	
	 
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

$result13 = mysql_query("SELECT billno, DATE_FORMAT(sell_date,'%d/%m/%Y'),cust_name,netpay ,accid,paid,balance from sell_invoice 
WHERE  sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y') order by  billno desc");


$result14 = mysql_query("SELECT billno, DATE_FORMAT(sell_date,'%d/%m/%Y') as selldate3, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, 
`salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno` FROM `sales_return_main` WHERE sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y') order by  billno desc");


$result1_c = mysql_query("SELECT count(1) FROM `sales_return_main` WHERE sell_date  between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y') order by  billno desc");

 
$row_c = mysql_fetch_array($result1_c);

$all_ret = $row_c['0'];




?>




<form name = "form2" >

<p align="center">  <input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/></p> 

<div id = "griddiv">


<table width="100%"  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"    >

<tr> <th style="text-align:center" colspan="8"  > <font color="blue"> <h4>SALE REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr> <th> SNO</th> <th> BILL NO</th> <th> DATE </th> <th> NET BILL </th>   <th> CASH </th>  <th> CARD </th> <th> CHQ./PAYTM </th>   <th> CREDIT </th>  <?php  if($_SESSION['auth'] == "ADMIN") {  ?> <th> DELETE </th> <?php  } ?>   </tr> 


<?php
 
$i = 0;
 $cas_Sale = 0;
  $chk_Sale = 0;
 
$card_Sale = 0;

$credit_Sale = 0;

$net_selll = 0;


$net_pay_t = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1;

$acc_id_1 = $row13['accid'];

if($acc_id_1 == 1) {  $cust_names_1 = "CASH";}
if($acc_id_1 == 2) {  $cust_names_1 = "CARD";}
if($acc_id_1 == 1774) {  $cust_names_1 = "CHQ";}

//if($acc_id_1 > 2) {  $cust_names_1 = $row13['2'];}
	







 ?>
  
 <tr>
   <td>  <?php  echo $i   ?>  </td>
      <td><font color="#663300"><a href="show_rec_bill.php?id= <?php echo  $row13['billno']?> "> <?php echo  $row13['billno']?>  </a></font></td>
    <td><?php echo  $row13['1']?></td>
	  <td> <?php echo  $row13['netpay'] ?>  </td>
		  <td> <?php if($acc_id_1 == 1) {echo  $row13['paid']; }?> </td> 
   <td> <?php if($acc_id_1 == 2) {echo  $row13['paid']; } ?> </td>
   <td> <?php if($acc_id_1 == 1774) {echo  $row13['paid']; } ?> </td>
      <td> <?php echo  $row13['balance']; ?> </td>
	     
		 
		  <?php  if($_SESSION['auth'] == "ADMIN") {  ?>  <td align = "center"><input type='button' name='btnprint' value='Delete' onclick='deleterecord_1("<?php echo  $row13['billno']  ?>",this)'/></td>  <?php  } ?> 
		 
	  
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




$net_pay_t = $net_pay_t + $row13['3'];

}

  $s_cas_Sale = $cas_Sale;
$s_card_Sale = $card_Sale;
$s_net_pay_t  = $net_pay_t;	

$s_net_pay_t = $card_Sale + $cas_Sale + $chk_Sale;

?>

 <tr> <td colspan = "6" align = "right">NET SELL : <?php echo $net_selll ?> ***   CASH : <?php echo $cas_Sale ?>  --  CARD : <?php echo $card_Sale ?> -- CHQ : <?php echo  $chk_Sale ?> **** NET Received : <?php echo $s_net_pay_t ?>  *** NET Credit : <?php echo $credit_Sale ?>  </td>  </tr> 

</table>




<br>
</br>

<?php 

if($all_ret > 0)

{
?>

<table width="100%"  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"    >

<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4>RETURN REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr> <th> SNO</th> <th> BILL NO</th> <th> DATE </th>  <th> CUSTOMER  </th> <th> NETPAY </th>  <?php  if($_SESSION['auth'] == "ADMIN") {  ?> <th> DELETE </th> <?php  } ?>   </tr> 


<?php
 
$i = 0;
 $cas_Sale = 0;
 
$card_Sale = 0;
$net_pay_t = 0;
while($row13 = mysql_fetch_array($result14))
  {   $i = $i + 1;

$acc_id_1 = $row13['accid'];

if($acc_id_1 == 1) {  $cust_names_1 = "CASH";}
if($acc_id_1 == 2) {  $cust_names_1 = "CARD";}
if($acc_id_1 == 1774) {  $cust_names_1 = "CHQ";}
//if($acc_id_1 > 2) {  $cust_names_1 = $row13['2'];}


 ?>
  
 <tr>
   <td>  <?php  echo $i   ?>  </td>
      <td><font color="#663300"><a href="show_rec_bill_r.php?id= <?php echo  $row13['billno']?> "> <?php echo  $row13['billno']?>  </a></font></td>
    <td><?php echo  $row13['1']?></td>
	 <td><?php  echo $cust_names_1 ?></td>
	  <td align = "right"><?php echo  $row13['3']?></td>
	     
		 
		 
		  <?php  if($_SESSION['auth'] == "SUDHIR") {  ?>  <td align = "center"><input type='button' name='btnprint' value='Delete' onclick='deleterecord_1("<?php echo  $row13['billno']  ?>")'/></td>  <?php  } ?> 
		 
	  
</tr>
  
<?php  

$c_id_1 = $row13['accid'] ;
if($c_id_1 == 1)
{  $cas_Sale = $cas_Sale + $row13['netpay'];  }
else
{
	$card_Sale = $card_Sale + $row13['netpay'] ;  
}

$net_pay_t = $net_pay_t + $row13['3'];

}

$net_amount = $s_net_pay_t - $net_pay_t;

  $r_cas_Sale = $cas_Sale;
$r_card_Sale = $card_Sale;
$r_net_pay_t  = $net_pay_t;
	?>

<tr>  <td>   </td>  <td>   </td> <td>  CASH : <?php echo $cas_Sale ?>   </td> <td> CARD : <?php echo $card_Sale ?>   </td> <td  align = "right">Net Amount : <?php echo $net_pay_t ?>   </td> </tr>
<tr>  <td>   </td> <td>   </td>   <td> Net CASH: <?php  echo $s_cas_Sale - $r_cas_Sale ?>  </td>  <td> Net CARD: <?php  echo $s_card_Sale - $r_card_Sale ?>  </td>   <td> Net Amount: <?php  echo $s_net_pay_t - $r_net_pay_t ?>  </td>   </tr>

</table>

<?php }



 ?>





</div>

</br>

 <input class = noPrint type = "text" size="10" width="30" name = "totalcnt" id = "totalcnt" value=<?php echo   $i ?> /> 

 
 
 
 




   



</div>






</div>
</div>
</div>
<script>
.//window.onload=happycode ; 
</script>
</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 