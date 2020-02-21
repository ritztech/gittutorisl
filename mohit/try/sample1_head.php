<!DOCTYPE html>


<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body   style="background-color:#FFFFCC;">



<div class = "head1" >



<div id="box1">
	<?php	  
	  session_start();
	  
if(!isset($_SESSION['uname'])) { header('Location: login.php'); }

echo " Welcome : " . $_SESSION['uname'];

?>

	</div>

	<div id="box2">
	<a  href="logout.php">LOGOUT</a>
	</div>
	


<div align = "center" id="header" style="background-color:#FF0000;">

<table>
<tr> <td>
<h3>  DEWDALE CO-OPEREATIVE HOUSING SOCIETY LTD </h3>  </td>  <tr>
<tr>  <td>    </td>  


</td>
<td>


</td>

</tr>

</table>





</div>




</div>

</body>
</html> 