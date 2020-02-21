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
<INPUT class = "btn" style="width:100%;" Type="BUTTON" VALUE="SEARCH BY DATE RANGE" ONCLICK="window.location.href='Report_purchase_date_store.php'"> </td> 


 <td> 
 <INPUT class = "btn" Type="BUTTON" VALUE="SEARCH BY DATE RANGE" ONCLICK="window.location.href='Report_sell_date.php'">
  </td>   </tr>
<tr> <td>
 <INPUT class = "btn" Type="BUTTON" VALUE="SEARCH BY VENDOR NAME AND DATE RANGE" ONCLICK="window.location.href='#'">

</td> <td>  
<INPUT class = "btn" Type="BUTTON" VALUE="ITEM SALE DATE WISE " ONCLICK="window.location.href='Report_sell_date_item1.php'">

   </td> </tr>

   
   

</table>




<div>



</div>
</div>
</form>

</body>
</html> 