<?php


//include ('sample1_head.php');
//include ('sample1_left.php');

include('config.php');

$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';



$id = $_GET['id'];

$result1 = mysql_query("SELECT DATE_FORMAT(sell_date,'%d/%m/%Y') as sell_date, `total`, `netpay`, `dis_rs`, `cust_id`,
 `cust_name`, `salesman_id`, `salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno`,retcom
 FROM `sales_return_main` WHERE   `billno` = $id");

 
$row1 = mysql_fetch_array($result1);

$result13 = mysql_query("SELECT `billno`, `itemid`, `qty`, `total`, `mrp`, `sprice`, `itemname`, `grpid` FROM `sales_item_return` WHERE billno = $id");


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
window.location='<?php echo  $refering_url  ?>';

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


<table  align = 'center' ,border = "2"  style="font-weight:bold;" width = "100%"  id = "printtable"  >
<tr>
<td>  <input type="button" name="btnprint" value="Print" onclick="jumpto()"/>  </td>

<td> <input type="button" name="CloseMe" value="Close Me" onClick="closeMe()"/> </td>
</tr>
<tr>
<th style="text-align:center" colspan="10"  >  <span  style="font-size:22px; font-weight:bold;" > RITZ RETAIL  STORE </span> </br>
<font  size = "1">P-5 BEHIND S.P OFFICE CITY CENTER , GWALIOR 
      CONTACT : 0751 2232548  </font>
</th>
</tr>


<tr> <td align = "left"> RETURN BILL   </td>   <td align = "right"> PARTY:  <?php echo $row1['cust_name']?> </td>   </tr>

<tr> <td style="text-align:left" colspan="1"  >    Return no: <?php echo $row1['billno']?>  </td>

 <td style="text-align:right" colspan="1"  > DATE:<?php echo $row1['sell_date']?> </td>  

 </tr>





<tr> 




<th colspan="10"><table width="100%"  style="font-weight:bold;"  border="1">
  <tbody>
    <tr style="background-color:black; color:white;" >
      <td width="1%">SNO</td>
      <td width="50%">ITEM NAME</td>
	   <td >Qty</td>
      <td >MRP</td>
      <td >RATE</td>
  
      <td >Total</td>
    </tr>
   <?php
 
$mrp_s = 0;
$rate_s = 0;
$allitem_s = 0;
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td>  <?php echo $i ?> </td>
   <td> <?php echo  $row13['itemname'] ?> </td>
   <td align = "center"> <?php echo  $row13['qty'] ?> </td>
   <td  align = "center"> <?php echo  $row13['mrp'] ?> </td> 
   <td  align = "center" > <?php echo  $row13['sprice'] ?> </td>
   
      <td align = "center" ><?php echo  $row13['total'] ?>  </td>

	  
    
</tr>
  
<?php  
$mrp_s = $mrp_s +($row13['mrp'] * $row13['qty']);
$rate_s = $rate_s +($row13['sprice'] * $row13['qty']);
$allitem_s = $allitem_s + $row13['qty']; }

$net_Save = $mrp_s - $rate_s;


	?>
	
<tr>
  </tbody>
</table>

</th> 
</tr>



</table>

<table  width="100%"  style="font-weight:bold;" >

<tr > <td align = "center"> *** Return remark : <?php echo $row1['retcom'];  ?>   ***  </td>

</tr>

<tr > <td align = "center">  <div class=""> <u> Total Items :   <?php   echo $allitem_s ?>  </u>  ,     (MRP * QTY GROSS  = ) : <?php   echo $mrp_s ?>  </br>
</br> <u> <font size = "6">Net Return   : <?php   echo $rate_s ?>  </font></u>  </br>
   </td> </div>  </tr>
 
 <tr>  <td align = "center"></br></br>PRICE INCLUSIVE OF VAT</br>
TIMING 11  AMTO 10 PM , TUESDAY CLOSED </br>


</td>  </tr>


</table>

<script>

window.onload=document.form123.btnprint.focus(); 


</script>

</form>
</body>
</html>
