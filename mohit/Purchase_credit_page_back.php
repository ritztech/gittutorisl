<?php

include('config.php');

$sql="UPDATE purchase_invoice  set p_notes = '$_POST[pnotes]' ,amount_paid = $_POST[ppaid],balance = $_POST[pbalance] where purchaseid =  $_POST[pid]";

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }

  mysql_close($dbConn);
  

echo "</br>";




?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body>
<div id="logincontainer">  
<div >  <h3> PURCHASE UPDATED  SUCCESFULLY   </h3> </div>
<div >  <h3> DO YOU WANT TO ADD MORE ENTRY   </h3> </div>
</br>
<form>
<div>
	<div class="empleftDiv"><a href="Report_purchase_credit.php">YES</a></div>
	<div class="emprightDiv"><a href="welcome.php">NO</a></div>
</div>
</br>
</form>
</div>
</body>
</html>
