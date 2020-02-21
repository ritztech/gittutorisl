<?php

include ('sample1_head.php');
include ('sample1_left.php');

$id = $_GET['id'];

$t_date = date("d/m/Y");
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

<script language="javascript">
function expensevalid(){

   
 if( document.form1.edate.value == "" )
   {
     alert( "Please fill return date!" );
     document.form1.edate.focus() ;
     return false;
   }
   
  

return true 

}

</script>


<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form name = "form1"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  onSubmit="return expensevalid()"  >


<div class = "head1" >
<div class = "center_page">



<div id="empcontainer">  



<div > <font color="blue"> <h3> BILL RETURN FORM </h3>  </font> </div>
</br>
<div>
	<div class="empleftDiv">BILL NO:</div>
	<div class="emprightDiv"><input type = "text" size="20"  name = "billno" id = "billno" value = <?php echo  $id ?>  /></div>
</div>

<div>
	<div class="empleftDiv">RETURN DATE:</div>
	<div class="emprightDiv"><input id="demo1" type = "text"  size="20" value = <?php echo  $t_date ?>    name = "edate"  />  <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>
	
</div>



<div>
	<div class="empleftDiv">REMARKS:</div>
	<div class="emprightDiv"><textarea rows="4" cols="20"  name="inputtext"> Nothing </textarea> </div>
</div>



</br>


<div class="emprightDiv"> <input type='submit' name="submit"  value='SAVE' />  
</br>
<INPUT type="reset">


</div>

</div>
</div>

</form>

</body>
</html> 

<?php

include('config.php');


if(isset($_POST['submit']))
{


$ret_bill = $_POST['billno'];

$result1 = mysql_query("SELECT `billno`, `sell_date`, `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name` FROM `sell_invoice`  WHERE billno = $ret_bill");
$row1 = mysql_fetch_array($result1);


$ret_rem = $_POST['inputtext'];
$ret_date = $_POST['edate'];

$sql="INSERT INTO `bill_return`(`billno`, `sell_date`, `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name`, `remarks`, `return_date`) VALUES ($row1[0],'$row1[1]',$row1[2],$row1[3],$row1[4],'$row1[5]','$row1[6]','$row1[7]','$row1[8]','$ret_rem',STR_TO_DATE('$ret_date','%d/%m/%Y'))";
				
								
if (!mysql_query($sql,$dbConn))
 {
  die('Error: ' . mysql_error());
  }

$sql12="DELETE FROM `sell_invoice`  WHERE billno = $ret_bill ";
				
								
if (!mysql_query($sql12,$dbConn))
 {
  die('Error: ' . mysql_error());
  }  
  

$result13 = mysql_query("SELECT  `itemid`, `qty`FROM `sell_items` WHERE `billno` = 104");

while($row13 = mysql_fetch_array($result13))
  {
  
 $sqlupd1="UPDATE `m_master_store` SET `qty`=(`qty`+ $row13[1])  WHERE `id`=$row13[0]";

if (!mysql_query($sqlupd1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  }
 
 mysql_close($dbConn);
 
// Below will be last line  


echo '<script type="text/javascript">alert("BILL RETURNED SCUCCESFULLY "); </script>'; 
header('Location: welcome.php');  
  

  
 } 


?> 




