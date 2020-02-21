<?php

include ('sample1_head.php');


include("config.php");




?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>


<script language="javascript">



</script>



</head>

<body>

<?php

include('config.php');


$idr = $_GET['id'];

$pieces = explode(",,,",$idr);


$id = $pieces[0];
$st_d = $pieces[1];





$result13 = mysql_query("select st.itemname ,st.weight,st.qty,si.billno  FROM sell_items st,sell_invoice  si where si.billno = st.billno 
and si.sell_date = STR_TO_DATE('$st_d','%d/%m/%Y')  and st.itemid = $id");




?>




<form name = "form2" >
<p align="center">

<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/> </p>

<div id = "griddiv">

 <table align="center">
 <tr><td>
<fieldset>
<br>
<table border='1' cellpadding="5"  frame="box"  width="100%">

<tr bgcolor="yellow"> <th> BILL NO</th> <th> DATE </th>  <th> ITEM </th>   <th> WEIGHT </th>   <th> QUANTITY </th>   </tr> 


<?php
 
$i = 0;
$tot_item = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1;
$tot_item=$tot_item + $row13['3'];
 ?>
  
 <tr>
   
   <td align="center"><font color="#663300"><a href="show_rec_bill.php?id= <?php echo  $row13['3']?> "> <?php echo  $row13['3']?>  </a></font></td>
   <td align="center"> <?php echo  $st_d ?>  </td>

   <td align="center"> <?php echo  $row13['0'] ?>  </td>
      <td align="center"> <?php echo  $row13['1'] ?>  </td>
	     <td align="center"> <?php echo  $row13['2'] ?>  </td>
    
</tr>
  
<?php  }	?>

 
</table>

 </fieldset>	 </td></tr></table>











</div>


</br>



</div>






</div>
</div>
</div>

</form>



</div>
</div>
</div>


</body>
</html> 