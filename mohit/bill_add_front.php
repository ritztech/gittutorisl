<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");

$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'--MRP--', `mrp`)) AS `desc` FROM `m_master_store`order by 2";
$result_dispMake=mysql_query($query_dispMake);


?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/bill_items.js">  </script>

<script language="javascript">

function h123(str)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	var arfruits = fruits.split(',');
	
	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[4]);
   



    }
  }
xmlhttp.open("GET","get_bill_item.php?q="+str,true);
xmlhttp.send();

document.form2.barscan.focus()


}



</script>

</head>

<body>


<div class = "head1" >
<div class = "center_page">



<form name = "form2" method="post" action="bill_add_back.php">


<div style="height:40px;width:200px;float:left;margin:10px 60px 10px 200px;">

 

<table   width="100%" cellspacing="5" cellpadding="2" border="2"  >

<tr>
    

   <td> SELECT ITEM </td> <td> <select name = "item_id">
	<option   value="" selected="selected"> </option>
	<?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['id']}>{$query_data['desc']}  </option>"; 

	 }
	 ?> </select> </td>  
	 <td> <INPUT type="button" value="ADD DRUG" onclick="h123(item_id.value)" /> </td>

</tr>	
	
</table>	 
</div>






<?php


include('config.php');

$t_date = date("d/m/Y");

$result1 = mysql_query("SELECT max( `sell_id` ) sell_id  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);

$sellid = $row1[0];

$sqlupd124="UPDATE m_auto_id SET sell_id=($sellid + 1)  WHERE sell_id=$sellid";
mysql_query($sqlupd124,$dbConn);
mysql_close($dbConn);






?>




<div  style="height:400px;width:350px;float:left;margin:70px 10px 10px -260px;">


<table width="100%" cellspacing="5" cellpadding="5" border="3" >

<tr>  <td><font color="red"> NET PAY</font> </td>  <td><input type = "text" name = "netpay"  id = "netpay"/> </td>  </tr>

<tr>
 <td width="50%">

<table >
  <tr>
    <td>NAME</td>  <td> <input type = "text" name = "uname"  value = "Not provided" id = "uname" /> </td>
  </tr>
  <tr>
    <td>ADDRESS</td>  <td><input type = "text" name = "uadr" value = "Not provided" id = "uadr" /> </td>
  </tr>
    <tr>
    <td>CONTACT</td>  <td> <input type = "text" name = "ucontact" value = "Not provided" id = "ucontact" /> </td>
  </tr>

</table>


</td>

 <td width="30%">

<table >
  <tr>
    <td>BILL NO</td>  <td> <input type = "text" readonly  name = "billno" value = <?php echo  $row1['sell_id']?>  id = "billno"/> </td>
  </tr>
  <tr>
    <td>SELL DATE</td>  <td><input type = "text" name = "sdate" value = <?php echo  $t_date ?>  id = "sdate"/> </td>
  </tr>
    <tr>
    <td>TOTAL</td>  <td> <input type = "text" name = "stotal"  id = "stotal"/> </td>
  </tr>
   <tr>
    <td>%.DISCOUNT</td>  <td><input type = "text" onkeyup="shappycode1()" name = "sdis" value = "0"  id = "sdis"/> </td>
  </tr>
     <tr>
    <td>Rs .DISCOUNT</td>  <td><input type = "text" onkeyup="shappycode1()" name = "rsdis" value = "0"  id = "rsdis"/> </td>
  </tr>
  <tr>
    <td>CASH/CREDIT:</td>  <td><select id='ptype'  name = 'ptype'>
	<option>CASH</option>
	<option>CREDIT</option>
</select> </td>
  </tr>
 
</table>


</td>



</tr>


<tr>

<td style="text-align:center" colspan="2"  > <INPUT type="button" style = "color:red; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onclick="deleteRow('dataTable')" />  
  <input type="submit" name="submit" style = "color:black; font-weight:bold;height: 25px; width: 100px; font:"Times New Roman", Times, serif; font-size:14px;"  value="SAVE">   </td>


</tr>

<tr>  


<td  style="text-align:center" colspan="2"  > 

<table width="100%"  id="dataTable" border='1' cellpadding='1'   >

  <tr>
    <th>  </th>  <th>Check</th>    <th>SNO</th>   <th>ITEM NAME</th>  <th>MRP</th>  <th>PRICE</th>  <th><font color="red"> QTY </font> </th>  <th>TOTAL</th>  
  </tr>
  
 

</table>   </td>


 </tr>

</table>




</div>






<input class = "noPrint" type = "text"  width="30" name = "totalcnt" id = "totalcnt"  /> 
 <input class = "noPrint" type = "text"  width="30" name = "alltotal" id = "alltotal" value="0" /> 




</br>

</br>



</form>



</div>
</div>



</body>
</html> 