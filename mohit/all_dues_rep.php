<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_user_back.php"  method = "post" >

 </br>
 <h2 align="center"> ALL  DUE REPORT </h2> 


<table  cellpadding='1' frame='box' bgcolor='white' border = '1' align="center" width="60%">
<tr>
<tr style="background-color:#22B5C1; color:#FFFFFF; font-size:15px;">  <th> SNO   </th> <th> Bill no   </th> <th> DATE </th> <th> Customer Name  </th>  <th> Net Amount  </th> <th> PAID  </th> <th> BALANCE </tr>

<?php


$result13 = mysql_query("SELECT `billno`,DATE_FORMAT(sell_date,'%d/%m/%Y') as sdate ,`cust_name`,`netpay`,  `paid`, `balance` FROM `sell_invoice` WHERE balance > 0 order by 1 desc");
while($row13 = mysql_fetch_array($result13))
{ $i=0;
   $i=$i+1;?>
<tr>
<td> <?php echo  $i ?></td>
<td><a   href="show_rec_bill_dues.php?id= <?php echo  $row13['0']?> ">    <?php echo  $row13['0']?>   </a></td>
<td> <?php echo  $row13['1'] ?></td>
<td> <?php echo  $row13['2'] ?></td>
<td> <?php echo  $row13['3'] ?></td>
<td> <?php echo  $row13['4'] ?></td>
<td> <?php echo  $row13['5'] ?></td>


</tr>

 <?php  }	?>


</table>



</div>
</div>
</form>

</body>
</html> 