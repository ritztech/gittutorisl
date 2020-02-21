<?php
include('config.php');

  $expdate = trim(strip_tags(addslashes(strtoupper($_POST['expdate'])))); 
    $cname = trim(strip_tags(addslashes(strtoupper($_POST['cname'])))); 
	  $mrp = trim(strip_tags(addslashes(strtoupper($_POST['mrp'])))); 
	    $sprice = trim(strip_tags(addslashes(strtoupper($_POST['sprice'])))); 
		 $cust_id = trim(strip_tags(addslashes(strtoupper($_POST['cust_id'])))); 
		


$sql="INSERT INTO `cust_pay`(`cust_id`, `cust_name`, `amount`, `remark`, `p_date`) VALUES
('$cust_id','$cname','$mrp','$sprice',STR_TO_DATE('$expdate','%d/%m/%Y')	
)";

//echo $sql;
 


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
    
  $sql1="UPDATE `m_customer` SET  n_bal = (n_bal - $mrp)   where `id`= $cust_id";

//echo $sql;
 


if (!mysql_query($sql1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
  mysql_close($dbConn);
  
//  echo "<script>alert('Item added Successfully');location.href='cust_get_front.php'</script>";
  

?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>



</head>
<body>

<div  align = "center">
<input type="button" name="btnprint" value="PRINT" onclick="PrintMe('griddiv')"/> 
<INPUT  class = "btn"   Type="BUTTON" VALUE="CLOSE" ONCLICK="window.location.href='bill_add_front_new.php'"/> 
</div>
<div id = "griddiv">
</br></br>


<table  border="2" align="center" >

<tr> <td > Customer name:  </td>  <td >  <?php echo $cname  ?> </td>   </tr>
<tr> <td> Pay Date </td>  <td> <?php echo $expdate  ?> </td>   </tr> 

<tr> <td> Amount paid : </td>  <td> <?php echo $mrp  ?>  </td>   </tr>

<tr> <td> Remark: </td>  <td> <?php echo $sprice  ?> </td>   </tr>


</table>

</div>

</body>

</html>






