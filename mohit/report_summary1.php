<?php

include ('sample1_head.php');

			
			if($_SESSION['auth']  == "NORMAL")
				
			
		{ header('Location: welcome.php'); }

	
		?>
		

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_user_back.php"  method = "post" >
  

<h3 align="center"> PLEASE SELECT YOUR REPORT   </h3>
 
<table border='1' cellpadding='3' align="center"   >
<tr>
<tr> <th> PURCHASE INVOICE REPORTS </th>  <th> SALE REPORTS  </th>   </tr>

<tr> <td> 
<INPUT class = "btn" style="width:100%;" Type="BUTTON" VALUE="SEARCH BY DATE RANGE" ONCLICK="window.location.href='Report_purchase_date.php'"> </td> 


 <td> 
 <INPUT class = "btn" Type="BUTTON" VALUE="SEARCH BY DATE RANGE" ONCLICK="window.location.href='Report_sell_date.php'">
  </td>   </tr>
<tr> <td>
 <INPUT class = "btn" Type="BUTTON" VALUE="SEARCH BY VENDOR NAME AND DATE RANGE" ONCLICK="window.location.href='Report_purchase_vendor.php'">

</td> <td>  
<INPUT class = "btn" Type="BUTTON" VALUE="SEARCH BY USER NAME" ONCLICK="window.location.href='Report_sell_date.php'">

   </td> </tr>
<tr> <th style="text-align:center" colspan="3"  > <a style="color: red" href="Report_drug_expiary.php"> DRUG EXPIARY REPORT </a></th> </tr>
<tr> <th style="text-align:center" colspan="3"  > <a style="color: red"href="Report_purchase_credit.php"> PURCHASE CREDIT REPORT </a></th> </tr>
<tr> <th style="text-align:center" colspan="3"  > <a style="color: red"  href="Report_buy_sell_telly.php"> BUY SELL TELLY DRUG WISE</a></th> </tr>
<tr> <th style="text-align:center" colspan="3"  > <a style="color: red"  href="Report_buy_sell_datewise.php"> BUY SELL TELLY DATE WISE</a></th> </tr>
<tr> <th style="text-align:center" colspan="3"  > <a style="color: red"  href="Report_other_exp.php"> OTHER EXPENSE  REPORT </a></th> </tr>
<tr> <th style="text-align:center" colspan="3"  > <a style="color: red" href="Net_profit.php"> NET PROFIT AND LOSS </a></th> </tr>

</table>




<div>



</div>
</div>
</form>

</body>
</html> 