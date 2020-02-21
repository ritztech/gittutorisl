<?php

include ('sample1_head.php');
include ('sample1_left.php');


?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "master_add_back.php"  method = "post" >

<div class = "head1" >
<div class = "center_page">
<INPUT class = "submenu"   Type="BUTTON" VALUE="EDIT MEDICINE" ONCLICK="window.location.href='ed_master_add_front.php'">


<div  style="margin-left:30%;">  




<font color="blue"> <h3> ADD NEW MEDICINE  </h3>  </font> 


</br>
<div>
	<div class="empleftDiv">DESCRIPTION:</div>
	<div class="emprightDiv"><input type = "text" name = "desc" id = "desc"/></div>
</div>
<div>
	<div class="empleftDiv">MG/ML:</div>
	<div class="emprightDiv"><input type = "text" name = "cap" id = "cap"/></div>
</div>

<div>
	<div class="empleftDiv">COMPANY:</div>
	<div class="emprightDiv"><input type = "text" name = "cmpname" id = "cmpname"/></div>
</div>


<div>
	<div class="empleftDiv">TRIGGER VAL:</div>
	<div class="emprightDiv"><input type = "text" name = "trg" id = "trg"/></div>
</div>
<div>
	<div class="empleftDiv">STORAGE:</div>
	<div class="emprightDiv"><input type = "text" name = "storage" value = "Not sure" id = "storage"/></div>
</div>


</br>

</br>

<div class="emprightDiv"> <input type='submit' value='ADD ITEM' />  
</br>



</div>






</div>
</div>
</form>

</body>
</html> 