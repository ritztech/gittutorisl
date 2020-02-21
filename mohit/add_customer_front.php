<?php

include ('sample1_head.php');
include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_customer_bck.php"  method = "post" >
 <h3 align="center"> ADD NEW CUSTOMER  </h3>  
</br>
<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td>Name:</td>
      <td><input type = "text"   size = "50" name = "vname" id = "vname"/></td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><input type = "text" maxlength = "10" size = "50" name = "cnt" id = "cnt"/></td>
    </tr>
	    <tr>
      <td>Opening dues:</td>
      <td><input type = "text" size = "50" name = "opd"  value = "0" id = "opd"/></td>
    </tr>
	
    <tr>
      <td>&nbsp;</td>
      <td><input type='submit' value='AddRecord' /><INPUT type="reset"></td>
    </tr>
  </tbody>
</table>




</br>
<h3 align="center"> EXISTING CUSTOMER </h3>  

<table border='1' cellpadding='3' align="center" >
<tr>
<tr> <th> NAME </th> <th> CONTACT </th>  <th> EDIT </th>  </tr>

<?php
$result13 = mysql_query("SELECT `id`, `name`, `contact` FROM `m_customer`");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <input type = "text" size = "30" readonly name = "v1name" value = "<?php echo  $row13['1'] ?>"/> </td>
<td> <input type = "text"  size = "12" readonly name = "v2contact" value = "<?php echo  $row13['2'] ?>"/> </td>
<td><b><font color="#663300"><a href="edit_customer_rec.php?id=<?php echo  $row13['0']?>">EDIT</a></font></b></td>
</tr>

 <?php  }	?>


</table>







</div>
</div>
</form>

</body>
</html> 