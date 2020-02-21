<?php

include ('sample1_head.php');
include("config.php");


$id = $_GET['id'];

$result1 = mysql_query("SELECT `name`, `contact`, `address`, `id`   from  m_salesman where id  = $id");

$row1 = mysql_fetch_array($result1);


?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" method="post"  action = "edit_salesman_rec_back.php"  >
  <h3 align="center"> UPDATE SALESMAN DETAIL </h3>  
</br>

<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td> ID:</td>
      <td><input type = "text" readonly  size = "40" name = "vid" value= "<?php echo  $row1['3']?>" id = "vid"/></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><input type = "text" name = "name"   size = "40"  value= "<?php echo  $row1['0']?>" id = "name"/></td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><input type = "text" name = "cnt" size = "40" value= "<?php echo  $row1['1']?>" id = "cnt"/></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><input type = "text" name = "addr" size = "40" value= "<?php echo  $row1['2']?>" id = "addr"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type='submit' name="submit"  value='UPDATE' />  </td>
    </tr>
  </tbody>
</table>


</form>


</body>
</html> 