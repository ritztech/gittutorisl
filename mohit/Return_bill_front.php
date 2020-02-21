<?php

include ('sample1_head.php');
include ('sample1_left.php');


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>



</head>

<body>
<div class = "head1" >
<div class = "center_page">


 
<form name = "form1"  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


<div id="p1itemcontainer"> 


	<div class="empleftDiv">
	
</br>	
	 
<table>
<tr>
<td> Enter Bill no</td>

<td> <input id="billno"  name = "billno"   type = "text"  size="15"   />  </td>
	 

	 
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

$id = $_GET['billno'];

$result1 = mysql_query("SELECT `billno`, DATE_FORMAT(sell_date,'%d/%m/%Y') , `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name` 
FROM `sell_invoice` WHERE   `billno` = $id");

$row1 = mysql_fetch_array($result1);


$result13 = mysql_query("select m_master_store.desc, DATE_FORMAT(m_master_store.exp_date,'%d/%m/%Y'),m_master_store.s_price,sell_items.qty,sell_items.total,
m_master_store.capacity from m_master_store,sell_items  where m_master_store.id = sell_items.itemid
and sell_items.billno  = $id");


?>




<form name = "form2" >

<div id="menu" style="height:200px;width:250px;float:left;margin:70px 10px 10px 60px;">

<table class="myTable" >
 <tr>
    <td><font color="red"> NET PAY</font> </td>  <td><input type = "text" name = "netpay" value = <?php echo  $row1[4]?> id = "netpay"/> </td>
  </tr>

 </table>
 </br>
 

<table class="myTable" >
  <tr>
    <td>NAME</td>  <td> <input type = "text" name = "uname" value = "<?php echo  $row1[5]?>"  id = "uname" /> </td>
  </tr>
  <tr>
    <td>ADDRESS</td>  <td><input type = "text" name = "uadr"  value = "<?php echo  $row1[6]?>"  id = "uadr" /> </td>
  </tr>
    <tr>
    <td>CONTACT</td>  <td> <input type = "text" name = "ucontact" value = <?php echo  $row1[7]?> id = "ucontact" /> </td>
  </tr>
  <tr>
    <td>DR NAME</td>  <td><input type = "text" name = "dname" value = "<?php echo  $row1[8]?>"  id = "dname" /> </td>
  </tr>
</table>



</div>


<div id="menu" style="height:200px;width:300px;float:left;margin:70px 10px 20px 10px;">

<a href="bill_return_front_new.php?id= <?php echo  $row1[0]?> "> CLICK HERE TO CANCEL THIS BILL </a>


</br>
</br/>
<table class="myTable" >
  <tr>
    <td>BILL NO</td>  <td> <input type = "text" readonly  name = "billno" value = <?php echo  $row1[0]?>  id = "billno"/> </td>
  </tr>
  <tr>
    <td>SELL DATE</td>  <td><input type = "text" name = "sdate" value = <?php echo  $row1[1]?>  id = "sdate"/> </td>
  </tr>
    <tr>
    <td>TOTAL</td>  <td> <input type = "text" name = "stotal" value = <?php echo  $row1[2]?> id = "stotal"/> </td>
  </tr>
   <tr>
    <td>%.DISCOUNT</td>  <td><input type = "text" name = "sdis" value = <?php echo  $row1[3]?>  id = "sdis"/> </td>
  </tr>
 
</table>

</div>


<div id="menu" style="height:200px;width:100px;float:left;margin:270px 10px 10px -600px;">




<table class="myTable" >

  <tr>
    <td>DESC</td> <td>MG/ML</td>  <td>EXP</td>  <td>SELL PRICE</td> <td> QTY </td> <td>TOTAL</td>  
  </tr>
  
  <?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
  
  <tr>

	 <td> <input type = "text" size="20" readonly name = "mastdesc<?php echo   $i ?>" value = "<?php echo  $row13[0] ?>"/> </td>
	 <td><input type = "text" size="12" readonly name = "capacity<?php echo   $i ?>" value = "<?php echo  $row13[5] ?>"/> </td>
     <td><input type = "text" size="12" readonly name = "mastexp<?php echo   $i ?>" value = "<?php echo  $row13[1] ?>"/> </td>
     <td> <input type = "text" size="12" readonly name = "massp<?php echo   $i ?>" value = "<?php echo  $row13[2] ?>"/> </td>
     <td><input type = "text" size="4"    readonly name = "qty<?php echo   $i ?>" value = "<?php echo  $row13[3] ?>" /> </td>
     <td><input type = "text" size="8" readonly name = "ttotal<?php echo   $i ?>" value = "<?php echo  $row13[4] ?>" /> </td>

 
 </tr>
 
 <?php  }	?>
 

</table>
</br> 


</br>



</div>




</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 