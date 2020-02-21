<?php
include('config.php');


$t_date = date("d/m/Y");


$cust_name = trim(strip_tags(addslashes(strtoupper($_POST['cust_name'])))); 



$bno = strtoupper($_POST['billno']);
$npay = strtoupper($_POST['npay']);
$ppaid = strtoupper($_POST['ppaid']);

$custid = strtoupper($_POST['custid']);




$getpay = strtoupper($_POST['getpay']);

$npaid = round(($ppaid + $getpay),2);

$n_bal = round(($npay -$npaid),2);



$sql="UPDATE `sell_invoice` SET `paid`=$npaid,`balance`=$n_bal WHERE  billno = $bno";

mysql_query($sql,$dbConn);


$sqlinv_due = "INSERT INTO `due_hstry`(`billno`, `pdate`, `paid`, `dues`, `net_amt`,cust_id) VALUES
  ($bno,STR_TO_DATE('$t_date','%d/%m/%Y'),'$getpay','$n_bal','$npay','$custid')";
 // echo $sqlinv_due;
 mysql_query($sqlinv_due,$dbConn);
 
  $sql="INSERT INTO `cust_pay`(`cust_id`, `cust_name`, `amount`, `remark`, `p_date`) VALUES
('$custid','$cust_name','$getpay','$bno',STR_TO_DATE('$t_date','%d/%m/%Y')	
)";

//echo $sql;

  


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
 
 
echo "<script>alert('Invoice updated  Sucessfully ');location.href='show_rec_bill_dues.php?id=$bno'</script>";

?>

