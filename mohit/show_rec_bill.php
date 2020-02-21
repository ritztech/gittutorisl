<?php


//include ('sample1_head.php');
//include ('sample1_left.php');

include('config.php');

$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

$all_t_tax=0;


$id = $_GET['id'];

$result1 = mysql_query("SELECT DATE_FORMAT(sell_date,'%d/%m/%Y') as sell_date, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, `salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno`,bill_time
 FROM `sell_invoice` WHERE   `billno` = $id");

 
$row1 = mysql_fetch_array($result1);

$result13 = mysql_query("SELECT `billno`, `itemid`, `qty`, `total`, `mrp`, `sprice`, `itemname`, `grpid`,weight,tax_type FROM `sell_items` WHERE billno = $id");


?>

<html>
<head>
<style>

.circle
{

border-radius:20%;

color:#fff;
text-align:center;
background:#000
}


.main {
  font-family:Arial,Verdana,sans-serif;
  font-size:1em; <font color='red'>/* Never set font sizes in pixels! */</font>
  color:#00f;
}



</style>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" >
function jumpto(){

						document.getElementById("printtable").deleteRow(0);
			
			window.location='<?php echo  $refering_url  ?>';
			window.print();
	
}

function closeMe()
{

//document.location.href = "Report_today_sell.php";
//window.location='<?php echo  $refering_url  ?>';

window.history.back();


}


</script>



</head>

<body>

	
<?php
/** 
*  Function:   convert_number 
*
*  Description: 
*  Converts a given integer (in range [0..1T-1], inclusive) into 
*  alphabetical format ("one", "two", etc.)
*
*  @int
*
*  @return string
*
*/ 
function convert_number($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Million"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
} 



?>

<form  name = "form123">




<table   class="main"  width = "100%"  id = "printtable"  >
<tr>
<td>  <input type="button" name="btnprint" value="Print" onclick="jumpto()"/>  </td>
  <td , align = "center">  <a href="bill_add_front_new_edit.php?id= <?php echo $id ?> "> Click here to edit  </a>    </td>  

<td> <input type="button" name="CloseMe" value="Close Me" onClick="closeMe()"/> </td>
</tr>

<tr>  <th  align = "right"  colspan="10" >   CONTACT : 0751 4073696  </br></br> </th> </tr>


<tr>  <th  align = "left"  colspan="10" >   GSTIN : 23AJOPD3389E1Z9  </th> </tr>
<tr>  <th  align = "right"  colspan="10" >   Serving quality since 1958  </th> </tr>
<tr>
<th style="text-align:center" colspan="10"  > <font size = "6"> GURUNANAK DRYFRUITS </font> </br>
<font size = "2">PATEL NAGAR  CITYCENTER , BEHIND S.P OFFICE GWALIOR 
       </font>
</th>
</tr>

<tr>
<th style="text-align:center" colspan="10"  > <font size = "4"></br> BILL OF SUPPLY </font> </br>
<font size = "2">
       </font>
</th>
</tr>




<tr> <td align = "left">   </td>   <td align = "right"> NAME:  <?php echo $row1['cust_name']?> </td>   </tr>

<tr> <td style="text-align:left" colspan="1"  >    Bill no: <?php echo $row1['billno']?>  </td>

 <td style="text-align:right" colspan="1"  > DATE:<?php echo $row1['sell_date']?> || <?php
 date_default_timezone_set("Asia/Kolkata");
 
echo " " . $row1['bill_time'];
?> </td>  

 </tr>





<tr> 




<th colspan="10"><table width="100%"  style="font-weight:bold; border: 2px solid black; border-collapse: collapse;"  border="1">
  <tbody  style="font-weight:bold;"  >
    <tr style="background-color:black; color:white;" >
      <td width="1%" style="font-weight:bold; border: 2px solid black;">SNO</td>
      <td width="30%" style="font-weight:bold; border: 2px solid black;">ITEM NAME</td>
	    <td width="10%" style="font-weight:bold; border: 2px solid black;">WEIGHT</td>
		<td width="5%" style="font-weight:bold; border: 2px solid black;">GST%</td>
	   <td style="font-weight:bold; border: 2px solid black;">Qty</td>
      <td style="font-weight:bold; border: 2px solid black;">MRP</td>
      <td style="font-weight:bold; border: 2px solid black;">RATE</td>
  
      <td style="font-weight:bold; border: 2px solid black;">Total</td>
    </tr>
   <?php
 
$mrp_s = 0;
$rate_s = 0;
$allitem_s = 0;
 
$gst_5=0;
$gst_12=0;
$gst_18=0;
$gst_28=0;


$i = 0;
while($row13 = mysql_fetch_array($result13))
  {  


$pur_tax= intval($row13['tax_type']);
$seel_price_z = $row13['sprice'];
 $tax_qty = $row13['qty'];
 
// echo "tax for ite  5% ".$pur_tax;

if($pur_tax == "5") {		



		
		$gst_val = round((1+(5/100)),2);
		//echo $gst_val;
		
		$val_before_tax = $seel_price_z/$gst_val;
		
		$tax_value = ($seel_price_z - $val_before_tax)*$tax_qty;
		
		$gst_5v = round(($tax_value ),2);
		
		$gst_5=$gst_5 + $gst_5v;
		
	//	 echo "Amount  for ite  5% ".$gst_5;
		
		}
	
if($pur_tax == "12") {		
		
		$gst_val = round((1+(12/100)),2);
		//echo $gst_val ;
		$val_before_tax = $seel_price_z/$gst_val;
		
		$tax_value = ($seel_price_z - $val_before_tax)*$tax_qty;
		
		$gst_12v = round(($tax_value),2);
		
		$gst_12=$gst_12 + $gst_12v;
		}
		
		if($pur_tax == "18") {		
		
		$gst_val = round((1+(18/100)),2);
		
		$val_before_tax = $seel_price_z/$gst_val;
		
		$tax_value = ($seel_price_z - $val_before_tax)*$tax_qty;
		
		$gst_18v = round(($tax_value),2);
		
		$gst_18=$gst_18 + $gst_18v;
		
		}
		
		if($pur_tax == "28") {		
		
		$gst_val = round((1+(28/100)),2);
		
		//echo $gst_val;
		
		$val_before_tax = $seel_price_z/$gst_val;
		
		$tax_value = ($seel_price_z - $val_before_tax)*$tax_qty;
		
		$gst_28v = round(($tax_value ),2);
		$gst_28=$gst_28 + $gst_28v;
		//echo '<br>';
		
		//echo $gst_28v ;
		//echo '<br>';
		}
		
		














 $i = $i + 1; ?>
  
 <tr style="font-weight:bold; border: 2px solid black;" >
   <td style="font-weight:bold; border: 2px solid black;" >  <?php echo $i ?> </td>
   <td style="font-weight:bold; border: 2px solid black;"> <font size = "4"  font-weight = "bold" > <?php echo  $row13['itemname'] ?>   </font> </td>
   <td style="font-weight:bold; border: 2px solid black;"> <?php echo  $row13['weight'] ?> </td>
    <td style="font-weight:bold; border: 2px solid black;" align="center"> <?php echo  $row13['tax_type'] ?> </td>
   <td style="font-weight:bold; border: 2px solid black;" align = "center"> <?php echo  $row13['qty'] ?> </td>
   <td style="font-weight:bold; border: 2px solid black;"  align = "center"> <?php echo  $row13['mrp'] ?> </td> 
   <td style="font-weight:bold; border: 2px solid black;"  align = "center" > <?php echo  $row13['sprice'] ?> </td>
   
      <td style="font-weight:bold; border: 2px solid black;" align = "center" ><?php echo  $row13['total'] ?>  </td>

	  
    
</tr>
  
<?php  
$mrp_s = $mrp_s +($row13['mrp'] * $row13['qty']);
$rate_s = $rate_s +($row13['sprice'] * $row13['qty']);
$allitem_s = $allitem_s + $row13['qty']; }

$net_Save = $mrp_s - $rate_s;

$sqlinv_u = "UPDATE `sell_invoice` SET `gst_5`='$gst_5',`gst_12`='$gst_12',`gst_18`='$gst_18',`gst_28`='$gst_28' where `billno` = $id";
//echo $sqlinv_u;
mysql_query($sqlinv_u,$dbConn);



	?>
	
<tr>
  </tbody>
</table>

</th> 
</tr>





</table>

<table  width="100%"  style="font-weight:bold;" >
<tr > <td align = "center">  <div class=""> <u> Total Items :   <?php   echo $allitem_s ?>  </u>  ,     (MRP * QTY GROSS  = ) : <?php   echo $mrp_s ?>  </br>


<?php 

if($row1['dis_rs'] > 0){?> 

<table border="0" ><tr> <td><div style="border-radius:15px; border-style: solid">&nbsp;&nbsp;&nbsp;

Dis Rs:       <?php  echo $row1['dis_rs']; ?>&nbsp;&nbsp;&nbsp;</div></td> </tr> </table> <?php  }  ?> 

<?php if($row1['dis_pr'] > 0){ ?> 

<table border="0" ><tr> <td><div style="border-radius:15px; border-style: solid">
Dis %:  <?php  echo $row1['dis_pr']; ?>&nbsp;&nbsp;&nbsp;</div></td> </tr> </table> <?php  }  ?>  



<u> <font size = "6"> Net Amount  : <?php echo $row1['netpay']?>  </font></u>

<?php if($row1['balance'] > 0){ ?>

</br><u> <font size = "5"> Net PAID  : <?php echo $row1['paid']?>  </font></u>
</br><u> <font size = "5"> Net DUE  : <?php echo $row1['balance']?>  </font></u>


<?php  }  ?>

<table border="0" ><tr> <td><div style="border-radius:15px; border-style: solid">
&nbsp;&nbsp;&nbsp; <font size = "6"> TOTAL SAVINGS : Rs. <?php   echo $mrp_s - $rate_s  ?> </font>&nbsp;&nbsp;&nbsp; </div></td> </tr> </table> </td> </div>  </tr>


<tr>
<td style="font-weight:bold; border: 2px solid black;"  >

<table  width = "100%" border = "1" style="font-weight:bold; font-size:14px;"  >


<tr>   <td  colspan = "4" align = "center">  GST SUMMARY   </td> </tr>
<tr style="font-size:10px;">  <td >  GST Rate </td>  <td>  SGST  </td>  <td>  CGST  </td> <td>  Total GST </td> 

<?php



 if($gst_5 > 0) { ?>

<tr>  <td>  5% </td>  <td>  @2.5% -- <?php echo round($gst_5/2,2)?>   </td>  <td>   @2.5% -- <?php echo round($gst_5/2,2)?>  </td> <td>  <?php echo $gst_5?> </td>
<?php $all_t_tax = $all_t_tax + $gst_5;  } ?>
<?php if($gst_12 > 0) { ?>
<tr>  <td>  12% </td>  <td>  @6% -- <?php echo round($gst_12/2,2)?>   </td>  <td>   @6% -- <?php echo round($gst_12/2,2)?>  </td> <td>  <?php echo $gst_12?> </td>
<?php  $all_t_tax = $all_t_tax + $gst_12;   } ?>
<?php if($gst_18 > 0) { ?>
<tr>  <td>  18% </td>  <td>  @9% -- <?php echo round($gst_18/2,2)?>   </td>  <td>   @9% -- <?php echo round($gst_18/2,2)?>  </td> <td>  <?php echo $gst_18?> </td>
<?php $all_t_tax = $all_t_tax + $gst_18;  } ?>
<?php if($gst_28 > 0) { ?>
<tr>  <td>  28% </td>  <td>  @14% -- <?php echo round($gst_28/2,2)?>   </td>  <td>   @14% -- <?php echo round($gst_28/2,2)?>  </td> <td>  <?php echo $gst_28?> </td>
<?php $all_t_tax = $all_t_tax + $gst_28;   } ?> 

<tr> <td colspan = "4"  align = "right">  TOTAL TAX : <?php   echo $all_t_tax; ?>  </td>  </tr>



</table>


</td>

</tr> 
 
 <tr>  <td align = "center"></br></br><font size = "4">*EXCHANGE WITHIN 7 DAYS WITH BILL</br>TUESDAY CLOSED</br>
 </br>
TIMING 11  AM TO 10 PM  </br>
*KEEP IT AIR TIGHT & REFRIGERATED FOR OPTIMUM FRESHNESS </br>
UNDER THE SCHEME OF COMPOSITION </font>

</td>  </tr>


</table>

<script>

window.onload=document.form123.btnprint.focus(); 


</script>

</form>
</body>
</html>
