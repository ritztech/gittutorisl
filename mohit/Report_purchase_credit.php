<?php

include ('sample1_head.php');
include ('sample1_left.php');


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

<script language="javascript">


function happycode(){

var tot = 0;
var j = document.form2.totalcnt.value;

for (var i=1; i<=j; i++)
  {
    

 var val3 = document.form2[ "pbalance" + i ].value 
 tot = Number(tot) + Number(val3);
 
 document.form2.alltotal.value = tot;
  }

 document.form2.totaact.value = j;
 
  
}

</script>



</head>

<body>
<div class = "head1" >
<div class = "center_page">



<?php

include('config.php');


$result13 = mysql_query("SELECT `purchaseid`, DATE_FORMAT( p_date,'%d/%m/%Y'), m_vendor.name, `total`, `amount_paid`, `balance` FROM `purchase_invoice`,m_vendor WHERE 
m_vendor.id = purchase_invoice.vendor_id
and `balance` > 0");


?>




<form name = "form2" >

</br>
</br>

<div id="purchasecontainer"> 

</br>
</br>
</br>

<table width = "90%" cellpadding='1' frame="box" bgcolor="white"   >

<tr> <th>  TOTAL RECORDS </th> <td> <input type = "text" size="10" width="30" name = "totaact" id = "totaact"  />  </td> <th> GRAND TOTAL </th> <td> <input type = "text" size="5" style="font-size:30px;font-weight:bold;color:#CC0000"  width="30" name = "alltotal" id = "alltotal" value = "0"  />  </td>   </tr>

</table>

</br>


<table width = "90%" border='1' cellpadding='1' frame="box" bgcolor="white"   >

<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4> PURCHASE CREDIT REPORT   </h4> </font> </th>  </tr>
<tr bgcolor="yellow" > <th> PURCHASE ID</th> <th> DATE </th>  <th> VENDOR  </th> <th> TOTAL </th> <th> PAID </th> <th> BALANCE </th>   </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td><font color="#663300"><a href="Report_purchase_show_rec.php?id= <?php echo  $row13['0']?> "> <?php echo  $row13['0']?>  </a></font></td>
   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="20" readonly name = "pvend<?php echo   $i ?>" value = "<?php echo  $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "ptotal<?php echo   $i ?>" value = "<?php echo  $row13['3'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "ppaid<?php echo   $i ?>" value = "<?php echo  $row13['4'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "pbalance<?php echo   $i ?>" value = "<?php echo  $row13['5'] ?>" />  </td>
    
</tr>
  
<?php  }	?>

</table>

</br>

<input class = noPrint  type = "text" size="10" width="30" name = "totalcnt" id = "totalcnt" value=<?php echo   $i ?> />  




   



</div>






</div>
</div>
</div>
<script>
window.onload=happycode ; 
</script>
</form>



</div>
</div>
</div>


</body>
</html> 