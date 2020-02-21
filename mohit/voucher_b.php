<?php
include('config.php');


  $expdate = trim(strip_tags(addslashes(strtoupper($_POST['expdate'])))); 
  
session_start();


//$_SESSION['date'] = $expdate;



	  $amount = trim(strip_tags(addslashes(strtoupper($_POST['mrp'])))); 
	  		 		 $ptype = trim(strip_tags(addslashes(strtoupper($_POST['ptype'])))); 
					 
					 

	  
	    $crdacc = trim(strip_tags(addslashes(strtoupper($_POST['custid'])))); 
		 $debacc = trim(strip_tags(addslashes(strtoupper($_POST['custid1'])))); 
		 

				 		 $remarks = trim(strip_tags(addslashes(strtoupper($_POST['remarks'])))); 
						 
						$refnumber = trim(strip_tags(addslashes(strtoupper($_POST['refnumber'])))); 
						 
						 
	

		
			

$sql="INSERT INTO `voucher`(`debitid`, `creditid`, `remark`,`ptype`, `tdate`, `refid`, `amount`) VALUES (
'$debacc','$crdacc','$remarks','$ptype',STR_TO_DATE('$expdate','%d/%m/%Y'),'$refnumber','$amount')";

//echo $sql;

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  $sql="UPDATE `customers` SET `net_due` = (net_due + '$amount' )  where `cid` = '$debacc'";

//echo $sql;

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
    $sql="UPDATE `customers` SET `net_due` = (net_due - '$amount' )  where `cid` = '$crdacc'";

//echo $sql;

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  
 
 
  
  
  mysql_close($dbConn);
  
 echo "<script>alert('Voucher added Successfully');location.href='voucher_f.php'</script>";
  

?>

