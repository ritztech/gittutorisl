<?php
include('config.php');

$expdate = trim(strip_tags(addslashes(strtoupper($_POST['expdate'])))); 
$amount = trim(strip_tags(addslashes(strtoupper($_POST['mrp'])))); 
$ptype = trim(strip_tags(addslashes(strtoupper($_POST['cashchk'])))); 
 
$tid = $_POST['tid']; 
					 
					 
$creditid999 = trim(strip_tags(addslashes(strtoupper($_POST['creditid999']))));
$debiid999 = trim(strip_tags(addslashes(strtoupper($_POST['debiid999']))));
$old_amount = trim(strip_tags(addslashes(strtoupper($_POST['old_amount']))));

					 


$sql="UPDATE `customers` SET `net_due` = (net_due - '$old_amount' )  where `cid` = '$debiid999'";


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
    $sql="UPDATE `customers` SET `net_due` = (net_due + '$old_amount' )  where `cid` = '$creditid999'";


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
	
					 
					 

	  
	    $crdacc = trim(strip_tags(addslashes(strtoupper($_POST['custid'])))); 
		 $debacc = trim(strip_tags(addslashes(strtoupper($_POST['custid1'])))); 
		 

				 		 $remarks = trim(strip_tags(addslashes(strtoupper($_POST['remarks'])))); 
						 
						$refnumber = trim(strip_tags(addslashes(strtoupper($_POST['refnumber'])))); 
						
			

$sql="UPDATE `voucher` SET `debitid`= '$debacc',
                      creditid= '$crdacc',
					   remark= '$remarks',
					   `ptype`= '$ptype',
					   `tdate`= STR_TO_DATE('$expdate','%d/%m/%Y'),
					   `refid`= '$refnumber',
					   `amount`= '$amount'
					   WHERE id = $tid";

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
  
 echo "<script>alert('Voucher added Successfully');location.href='all_voucher.php'</script>";
  

?>

