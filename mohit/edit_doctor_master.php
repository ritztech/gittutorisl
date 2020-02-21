<?php

include('config.php');
include ('sample1_head.php');
include ('sample1_left.php');


$id = $_GET['id'];


$result1 = mysql_query("SELECT `did`, `dname`, `dcontact`, `daddress`,cityname FROM `doc_master` WHERE did = $id");

$row1 = mysql_fetch_array($result1);



?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

<script language="javascript">

function unitcalc() {
	
document.form1.utotal.value = document.form1.units.value * document.form1.uprice.value;
		
}

</script>


</head>

<body>
 
<form  name = "form1" action = "edit_doctor_master_bck.php"  method = "post" >

<div class = "head1" >
<div class = "center_page">


<div id="empcontainer">  


<div > <font color="blue"> <h2> EDIT CUSTOMER  DETAILS   </h2> </font>  </div>
</br>
<div>
	<div class="empleftDiv">Name:</div>
	<div class="emprightDiv"><input type = "text" name = "dname" size = "50" id = "dname" value= "<?php echo   $row1['1']?>"  /></div>
</div>
<div>
	<div class="empleftDiv">Contact :</div>
	<div class="emprightDiv"><input type = "text" name = "dcontact" size = "50"  id = "dcontact" value= "<?php echo   $row1['2']?>"  /></div>
</div>
<div>
	<div class="empleftDiv">CITY :</div>
	<div class="emprightDiv"><input type = "text" name = "drcity"  size = "50"  id = "drcity" value= "<?php echo   $row1['4']?>"  /></div>
</div>
<div>
	<div class="empleftDiv">Address:</div>
	<div class="emprightDiv">  <textarea name="daddress" rows="5" cols="35"    ><?php echo   $row1['3']?></textarea>  </div>
</div>

</br>



<div class="emprightDiv"> <input type='submit' value='SAVE' />  
</br>



</div>


<input type="hidden" name="e_sno" id="e_sno" value="<?php echo $id; ?>" />


</div>

</div>
</form>

</body>
</html> 