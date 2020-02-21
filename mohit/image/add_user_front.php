<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_user_back.php"  method = "post" >

<div class = "head1" >
<div class = "center_page">



<div id="empcontainer">  



<div >  <h1> ADD NEW USER  </h1> </div>
</br>
<div>
	<div class="empleftDiv">UserID:</div>
	<div class="emprightDiv"><input type = "text" name = "uid" id = "uid"/></div>
</div>
<div>
	<div class="empleftDiv">PASSWORD:</div>
	<div class="emprightDiv"><input type = "text" name = "pass" id = "pass"/></div>
</div>
<div>
	<div class="empleftDiv">NAME:</div>
	<div class="emprightDiv"><input type = "text" name = "uname" id = "uname"/></div>
</div>
<div>
	<div class="empleftDiv">AUTHORITY:</div>
	<div class="emprightDiv">  <select id='auth'  name = 'auth'>
	<option>NORMAL</option>
	<option>SUPER</option>
</select>  </div>
</div>



</br>


<div class="emprightDiv"> <input type='submit' value='AddRecord' />  
</br>
<INPUT type="reset">


</div>

 
<div id="menu" style="height:200px;width:200px;float:left;margin:-230px 10px 20px 500px;">

<h2> USER LIST  </h2>

<table border='1' cellpadding='3' >
<tr>
<tr> <th> USERID  </th> <th> NAME </th> <th> AUTHORITY  </th>  </tr>

<?php
$result13 = mysql_query("SELECT *  FROM `muser`");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <input type = "text" size = "10"  readonly name = "uid" value = "<?php echo  $row13['id'] ?>"/> </td>
<td> <input type = "text" size = "10" readonly name = "name" value = "<?php echo  $row13['name'] ?>"/> </td>
<td> <input type = "text"  size = "20" readonly name = "auth" value = "<?php echo  $row13['auth'] ?>"/> </td>
</tr>

 <?php  }	?>


</table>



<div>



</div>
</div>
</form>

</body>
</html> 