<?php

include ('sample1_head.php');

include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_user_back.php"  method = "post" >



 <h2 align="center"> ADD NEW USER  </h2>
</br>

<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td>UserID:</td>
      <td><input type = "text" name = "uid" id = "uid"/></td>
    </tr>
    <tr>
      <td>PASSWORD:</td>
      <td><input type = "text" name = "pass" id = "pass"/></td>
    </tr>
    <tr>
      <td>NAME:</td>
      <td><input type = "text" name = "uname" id = "uname"/></td>
    </tr>
    <tr>
      <td>AUTHORITY:</td>
      <td> <select id='auth'  name = 'auth' style="width:140px;">
	<option>NORMAL</option>
	<option>SUPER</option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type='submit' value='AddRecord' /><INPUT type="reset"></td>
    </tr>
  </tbody>
</table>




</br>


 
<h2 align="center"> EXISTING USERS </h2> 

<table border='1' cellpadding='3' align="center" >
<tr>
<tr> <th> USERID  </th> <th> PASSWORD </th> <th> NAME </th> <th> AUTHORITY  </th> <th> DELETE  </th>  </tr>

<?php
$result13 = mysql_query("SELECT *  FROM `muser`");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <input type = "text" size = "10"  readonly name = "nuid" value = "<?php echo  $row13['0'] ?>"/> </td>
<td> <input type = "text" size = "10" readonly name = "nname" value = "<?php echo  $row13['1'] ?>"/> </td>
<td> <input type = "text"  size = "20" readonly name = "npassword" value = "<?php echo  $row13['2'] ?>"/> </td>
<td> <input type = "text"  size = "20" readonly name = "nauth" value = "<?php echo  $row13['3'] ?>"/> </td>
<td><b><font color="#663300"><a href="delete_app_user.php?id=<?php echo  $row13['0']?>">DELETE</a></font></b></td>
</tr>

 <?php  }	?>


</table>



<div>



</div>
</div>
</form>

</body>
</html> 