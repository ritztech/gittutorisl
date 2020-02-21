<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_color_b.php"  method = "post" >

 <h2 align="center"> ADD NEW COLOR  </h2> 
</br>

<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td>Name:</td>
      <td><input type = "text" size = "25"  autofocus  name = "clname" id = "clname"/></td>
      <td><input type='submit' value='AddRecord' /></td>
    </tr>
  </tbody>
</table>



<br>

<table border='1' cellpadding='3' align="center" >
<tr>
<tr  style="background-color:#22B5C1; color:#FFFFFF; font-size:15px;"> <th> CATEGORY NAME  </th>  <th> EDIT  </th>  </tr>

<?php
$result13 = mysql_query("SELECT `id`, `name` FROM `p_category` ");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <?php echo $row13['1'] ?></td>	
<td><b><font color="#663300"><a href="edit_company_shade.php?id=<?php echo $row13['0']?>">EDIT</a></font></b></td>
</tr>

 <?php  }	?>


</table>





</div>

</form>

</body>
</html> 