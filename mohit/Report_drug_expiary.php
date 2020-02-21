<?php

include ('sample1_head.php');
include ('sample1_left.php');


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript">

function happycode(){

 document.form2.totactnt.value =  document.form2.totalcnt.value;


}

</script>


</head>

<body>
<div class = "head1" >
<div class = "center_page">



<?php

include('config.php');



$result13 = mysql_query("select m_master_store.desc,capacity,DATE_FORMAT(exp_date,'%d/%m/%Y')  from m_master_store WHERE exp_date between CURDATE()   and  DATE_ADD( now( ) , INTERVAL 3
MONTH )  and qty > 0");


?>




<form name = "form2" >

</br>
</br>

<div id="purchasecontainer"> 

</br>
</br>
</br>


<table  cellpadding='1' frame="box" bgcolor="white"    >
<tr> <th>  TOTAL RECORDS </th> <td> <input type = "text" size="10" width="30" name = "totactnt" id = "totactnt"  />  </td>   </tr>
</table>

</br>


<table border='1' cellpadding='1' frame="box"  bgcolor="white"   >

<tr> <th style="text-align:center" colspan="6"  > <font color="blue"> <h4> DRUG  EXPIARY EPORT FOR NEXT 3 MONTHS   </h4> </font> </th>  </tr>
<tr> <th> DESCRIPTION </th> <th> CAPACITY </th>  <th> EXPIARY  </th>   </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   

   <td> <input type = "text" size="12" readonly name = "pdate<?php echo   $i ?>" value = "<?php echo  $row13['0'] ?>" />  </td>
   <td> <input type = "text" size="20" readonly name = "pvend<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="15" readonly name = "ptotal<?php echo   $i ?>" value = "<?php echo  $row13['2'] ?>" />  </td>

    
</tr>
  
<?php  }	?>

</table>

</br>


 <input  class = noPrint  type = "text" size="10" width="30" name = "totalcnt" id = "totalcnt" value=<?php echo   $i ?> />  




   



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