<?php

include('config.php');

$sql="INSERT INTO `other_expense`(`exp_type`, `exp_date`, `exp_amount`, `exp_rem`) VALUES ('{$_POST['expt']}',STR_TO_DATE('{$_POST['edate']}','%d/%m/%Y'),{$_POST['eamount']},'{$_POST['inputtext']}')";
mysql_query($sql,$dbConn);
mysql_close($dbConn);


?>



<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body>
<div id="logincontainer">  
<div >  <h3> EXPENSES ADDEDD SUCCESFULLY   </h3> </div>
<div >  <h3> DO YOU WANT TO ADD MORE ENTRY   </h3> </div>
</br>
<form>
<div>
	<div class="empleftDiv"><a href="add_other_exp_front.php">YES</a></div>
	<div class="emprightDiv"><a href="welcome.php">NO</a></div>
</div>
</br>
</form>
</div>
</body>
</html>

