<?php


//include ('sample1_head.php');
//include ('sample1_left.php');

include('config.php');

$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';



$id = $_GET['id'];

$result1 = mysql_query("SELECT `billno`, DATE_FORMAT(sell_date,'%d/%m/%Y') as sell_date, `total`, `dis_pr`, `netpay`, `dis_rs`, `t_cash`, `t_card`,
 `t_sodexo`, `balance`, cust_name,paid,balance FROM `sell_invoice` , doc_master  WHERE  `billno` = $id");


$row1 = mysql_fetch_array($result1);

$totalcash  = $row1['t_cash'];
$totalcard  = $row1['t_card'];
$totalsodexo  = $row1['t_sodexo'];


$result13 = mysql_query("select sell_items.itemname, sell_items.mrp,sell_items.qty,sell_items.total,
sell_items.sprice from sell_items  where  sell_items.billno  = $id");




?>

<html>
<head>
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
<th style="text-align:center" colspan="10"  ><h2>KHANDELWAL DEPARTMENTAL  </h2> 
<pre>P-5 BEHIND S.P OFFICE CITY CENTER , GWALIOR 
      CONTACT : 0751 2232548   </pre>
</th>
</tr>



<tr> <td colspan="10" , align = "center"> NET AMOUNT : <?php echo $row1['4']?> PAID : <?php echo $row1['paid']?> BALANCE: <?php echo $row1['balance']?>  </td>  </tr>
<tr> <td style="text-align:left" colspan="1"  > Bill no: </td>

<td style="text-align:left" colspan="2"  > <?php echo $row1['billno']?> </td> 
 <td style="text-align:left" colspan="1"  > Customer Name: <?php echo $row1['cust_name']?> </td>  

<td style="text-align:left" colspan="6"  > <font size = 2>   </font> </td> </tr>

<tr> <td style="text-align:left" colspan="1"  > DATE: </td>

<td style="text-align:left" colspan="9"  > <?php echo $row1['sell_date']?></td>  </tr>



<tr> 




<th colspan="10"><table width="100%"  style="font-weight:bold;"  border="1">
  <tbody>
    <tr>
      <td width="7%">sno</td>
      <td width="40%">Item Name</td>
      <td width="11%">MRP</td>
      <td width="13%">Price</td>
      <td width="9%">Qty</td>
      <td width="11%">SAVE</td>
      <td width="9%">Total</td>
    </tr>
   <?php
 
$ns = 0; 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td>  <?php echo $i ?> </td>
   <td> <?php echo  $row13['0'] ?> </td>
   <td> <?php echo  $row13['1'] ?> </td> 
   <td> <?php echo  $row13['4'] ?> </td>
   <td> <?php echo  $row13['2'] ?> </td>
     <td> <?php echo  $row13['1'] - $row13['4'] ?> </td>
      <td><?php echo  $row13['3'] ?>  </td>

	  
    
</tr>
  
<?php  
$ns = $ns +$row13['1'] - $row13['4']; }	?>


<tr>
  </tbody>
</table>
</th> 
</tr>


<th style="text-align:center" colspan="10"> 
<span style="font-size:10px;">


<?php

if ($totalcash  > 0)
{
echo "                                                                      CASH : $totalcash  ";
}

if ($totalcard  > 0)
{
echo "CARD : $totalcard  ";
}


if ($totalsodexo  > 0)
{
echo "SODEXO : $totalsodexo ";
}



?>





    Total :<?php echo $row1['total']?> ,
								      Dis % :<?php echo $row1['dis_pr']?> 
								      ,Dis Rs. :<?php echo $row1['dis_rs']?>    </span> 
								   </th> </tr>
<tr> <th colspan="10">						 <font   size  ".5" >  <span style="font-size:10px;">NET AMOUNT</span> : </font>  <font   size  "1.5" > <?php echo $row1['netpay']?>   </font>   </th>  </tr>
<tr> <th colspan="10" >  You Saved  Rs. <?php echo $ns ?>  on this purchase   </th> </tr>



</table>

<script>
window.onload=document.form123.btnprint.focus(); 


</script>

</form>
</body>
</html>
