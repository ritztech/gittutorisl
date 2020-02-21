<?php

include ('sample1_head.php');
include("config.php");


$id = $_GET['id'];

$result1 = mysql_query("select * from m_vendor where id  = $id");

$row1 = mysql_fetch_array($result1);


?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" method="post"  action = "edit_vendor_rec_back.php"  >
 <h3 align="center"> UPDATE VENDOR DETAIL </h3> 
</br>
<table width="20%" border="1" align="center">
  <tbody>
    <tr>
      <td>Vendor ID:</td>
      <td><input type = "text" readonly  name = "vid" value= "<?php echo  $row1['0']?>" id = "vid"/></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><input type = "text" name = "name" value= "<?php echo  $row1['1']?>" id = "name"/></td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><input type = "text" name = "cnt" value= "<?php echo  $row1['2']?>" id = "cnt"/></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><input type = "text" name = "addr" value= "<?php echo  $row1['3']?>" id = "addr"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn" type='submit' name="submit"  value='UPDATE' />  </td>
    </tr>
  </tbody>
</table>



</form>


</body>
</html> 