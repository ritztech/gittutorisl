<?php

include('config.php');
include ('sample1_head.php');
//include ('sample1_left.php');


$id = $_GET['id'];



$result1 = mysql_query("SELECT `name` FROM `p_category`  WHERE  `ID`  = $id");

$row1 = mysql_fetch_array($result1);



?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


</head>

<body>
 
<form  name = "form1" action = "edit_company_shade_bck.php"  method = "post" >

 <h2 align="center"> EDIT CATEGORY   </h2> 
</br>

<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td>COMPANY:</td>
      <td><input type = "text" name = "clname" id = "clname" value= "<?php echo   $row1['0']?>"  /></td>
      <td><input type='submit' value='UPDATE' />  </td>
    </tr>
  </tbody>
</table>

</br>



<input type="hidden" name="e_sno" id="e_sno" value="<?php echo $id; ?>" />


</div>

</div>
</form>

</body>
</html> 