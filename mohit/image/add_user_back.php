<?php
$con = mysql_connect("localhost","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test", $con);

$sql="INSERT INTO muser  VALUES ('$_POST[uid]','$_POST[pass]','$_POST[uname]','$_POST[auth]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


echo "</br>";




?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body>
<div id="logincontainer">  
<div >  <h3> USER ADDEDD SUCCESFULLY   </h3> </div>
<div >  <h3> DO YOU WANT TO ADD MORE ENTRY   </h3> </div>
</br>
<form>
<div>
	<div class="empleftDiv"><a href="add_user_front.php">YES</a></div>
	<div class="emprightDiv"><a href="welcome.php">NO</a></div>
</div>
</br>
</form>
</div>
</body>
</html>
