<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

//$id = $_GET['id'];

$id = 32;


$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';


 




$result1 = mysql_query("SELECT `purchaseid`, DATE_FORMAT(p_date,'%d/%m/%Y') as sell_date, `vendor_id`, `p_receipt`, `total`, `p_notes`, `user_ent`,
 `vend_name` FROM `purchase_invoice` WHERE purchaseid = $id");
 
$row1 = mysql_fetch_array($result1);


$result13 = mysql_query("SELECT `purchaseid`, `ited_id`, `itemname`, `mrp`, `sell_price`, `buy_price`, `buy_qty`, 
DATE_FORMAT(expiry_date,'%d/%m/%Y') as expiry_date , `batchno`, `total`, 
`barcode`, `gruop_id` FROM `purchase_item` WHERE   purchaseid  =  $id");


 

 


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>



  
 
<script language="javascript" type="text/javascript" >

function closeMe()
{

//document.location.href = "Report_today_sell.php";
window.location='<?php echo  $refering_url  ?>';

}


</script>




</head>

<body>
 
<form name = "form2"   id="form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >
</br>

<div align = "center">

<input type="button" name="CloseMe"  id = "CloseMe" value="Close Me" onClick="closeMe()"/> 
<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/> 


</div>

<div id = "griddiv">



<br>

<input type = "hidden" size="15"   name = "barvalue" value= <?php echo  $row1_b['0']?> id = "barvalue"/> 
<div align = "center">PURCHASE DETAILS  </div>
<table width="100%"  border='1' cellpadding='1' frame="box">

<tr style="background-color:#000000;  color:#FFF;" >
  <td  align = "center">PURCHASE DATE:     <input id="demo1" type = "text"  size="15"  name = "pdate" value= "<?php echo  $row1['sell_date'] ?>"  />
    <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
	  RECIEPT/Voucher:  <input type = "text" size="15"    value= "<?php echo  $row1['sell_date'] ?>"   value = "AAAA" name = "pct"  id = "pct" style="width:135px;"/>
  User :    <input type = "text" readonly name = "euser"  id = "euser"  value= "<?php echo  $row1['sell_date'] ?>" />
      </td>
</tr>

<tr style="background-color:#000000;  color:#FFF;" >
  <td align = "center" >
  
  
  
   TOTAL:  <input type = "text" size="15"   name = "ptotal" value= "<?php echo  $row1['sell_date'] ?>"  id = "ptotal" style="width:132px;"/>
  Purchase Notes :  <input type = "text" name = "pnotes"  value= "<?php echo  $row1['sell_date'] ?>"  value = "None" id = "pnotes" size="50" />
    </td>
  </tr>
  
     <tr  style="background-color:#FDFBFB;  " >
<td colspan = 2 align = "center"> 
	VENDOR   NAME : <input type = "text" name = "cst_name"  tabindex = "1"  value= "<?php echo  $row1['sell_date'] ?>"   size = "30"  />
 



	  </td> </tr>
	  



</table>&nbsp;</td>
  </tr>
  

<td  style="text-align:center" colspan="4"  > 

<table  id="dataTable"  border='1' cellpadding='1' frame="box" width="100%"   >


<tr> <th>SNO</th><th> ITEM NAME </th>  <th> MRP  </th> <th> PRICE </th>   <th> EXPIARY </th> 

 <th> BATCHNO </th>   <th> BARCODE </th>    <th> QTY </th>  <th> Buy Price </th> 
  <th> TOTAL </th>  </tr> 
  
  
  <?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td> <?php echo $i ?>  </td>
   <td> <?php echo  $row13['itemname'] ?> </td>
   <td> <?php echo  $row13['mrp'] ?> </td>
   <td> <?php echo  $row13['sell_price'] ?> </td>
   <td> <?php echo  $row13['expiry_date'] ?> </td>
   <td> <?php echo  $row13['batchno'] ?> </td>
   
   
      <td> <?php echo  $row13['barcode'] ?> </td>
	     <td> <?php echo  $row13['buy_qty'] ?> </td>
		    <td> <?php echo  $row13['buy_price'] ?> </td>
			   <td> <?php echo  $row13['total'] ?> </td>
			   
     
 
</tr>


   
<?php  }	?>


  
</table>





</td>  </tr>


</table>



</br>



</div>




</form>





</div>
</div>

<script>
window.onload=document.form2.CloseMe.focus();
</script>

</body>
</html> 