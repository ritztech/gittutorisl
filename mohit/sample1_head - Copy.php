<!DOCTYPE html>


<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body   style="background-color:#FFFFCC;">


<div class = "head1" >

<div id="header" style="background-color:#FFA500;">
<p align=right> <a href="logout.php">LOGOUT</a>  
</br> 

<?php	  
	  session_start();
	  
if(!isset($_SESSION['uname'])) { header('Location: login.php'); }

echo " Welcome : " . $_SESSION['uname'];
echo "</br>";

?>

</p>


</div>



</div>

</body>
</html> 