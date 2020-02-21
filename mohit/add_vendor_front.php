<?php

include ('sample1_head.php');

include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_vendor_back.php"  method = "post" >
<h3 align="center"> ADD NEW VENDOR  </h3> 
</br>
<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td>Name:</td>
      <td><input type = "text" name = "vname" id = "vname"/></td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><input type = "text" name = "cnt" id = "cnt"/></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><input type = "text" name = "addr" id = "addr"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type='submit' value='AddRecord' /> <INPUT type="reset"></td>
    </tr>
  </tbody>
</table>


</br> <h3 align="center"> EXISTING USERS </h3>  

<table border='1' cellpadding='3' align="center" >
<tr>
<tr> <th> NAME </th> <th> CONTACT </th> <th> ADDRESS </th> <th> EDIT </th>  </tr>

<?php
$result13 = mysql_query("SELECT *  FROM m_vendor ");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <input type = "text" size = "30" readonly name = "v1name" value = "<?php echo  $row13['1'] ?>"/> </td>
<td> <input type = "text"  size = "12" readonly name = "v2contact" value = "<?php echo  $row13['2'] ?>"/> </td>
<td> <input type = "text"  size = "20" readonly name = "v3address" value = "<?php echo  $row13['3'] ?>"/> </td>
<td><b><font color="#663300"><a href="edit_vendor_rec.php?id=<?php echo  $row13['0']?>">EDIT</a></font></b></td>
</tr>

 <?php  }	?>


</table>



</div>



</div>
</div>
</form>

</body>
</html> 