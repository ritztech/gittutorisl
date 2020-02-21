<!DOCTYPE html>


<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body   style="background-color:#FFFFCC;">


<div class = "head1" >


<div style="background-color:orange;text-align:center">


<table  width="100%" cellspacing="5" cellpadding="2" border="0"  >
<tr>
<td align="left"  >

<?php	  
	  session_start();
	  
if(!isset($_SESSION['uname'])) { header('Location: login.php'); }

echo " Welcome : " . $_SESSION['uname'];
echo "</br>";

?>

</td>

<td  align="center" >

<h3> ABC  MEDICAL STORE   </h3>

</td>

<td align="right">
<a href="logout.php">LOGOUT</a>  

</td>


</tr>

</table>



</div>





</div>

</body>
</html> 