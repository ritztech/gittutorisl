<?php

include('config.php');

$sql="INSERT INTO `m_vendor`(`name`, `contact`, `address`) VALUES ('$_POST[vname]','$_POST[cnt]','$_POST[addr]')";

mysql_query($sql,$dbConn);
echo "</br>";
mysql_close($dbConn);




?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body>
<div id="logincontainer">  
<div >  <h3> VENDOR ADDEDD SUCCESFULLY   </h3> </div>
<div >  <h3> DO YOU WANT TO ADD MORE ENTRY   </h3> </div>
</br>
<form>
<div>
	<div class="empleftDiv"><a href="add_vendor_front.php">YES</a></div>
	<div class="emprightDiv"><a href="welcome.php">NO</a></div>
</div>
</br>
</form>
</div>
</body>
</html>

