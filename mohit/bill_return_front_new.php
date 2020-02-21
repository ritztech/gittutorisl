<?php

include ('sample1_head.php');
include ('sample1_left.php');

$id = $_GET['id'];

$t_date = date("d/m/Y");
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

<script language="javascript">
function expensevalid(){

   
 if( document.form1.edate.value == "" )
   {
     alert( "Please fill return date!" );
     document.form1.edate.focus() ;
     return false;
   }
   
  

return true 

}

</script>


<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form name = "form1" method="post" action="bill_return_back_new.php">

<div class = "head1" >
<div class = "center_page">



<div id="empcontainer">  



<div > <font color="blue"> <h3> BILL RETURN FORM </h3>  </font> </div>
</br>
<div>
	<div class="empleftDiv">BILL NO:</div>
	<div class="emprightDiv"><input type = "text" size="20"  name = "billno" id = "billno" value = <?php echo  $id ?>  /></div>
</div>

<div>
	<div class="empleftDiv">RETURN DATE:</div>
	<div class="emprightDiv"><input id="demo1" type = "text"  size="20" value = <?php echo  $t_date ?>    name = "edate"  />  <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>
	
</div>



<div>
	<div class="empleftDiv">REMARKS:</div>
	<div class="emprightDiv"><textarea rows="4" cols="20"  name="inputtext"> Nothing </textarea> </div>
</div>



</br>


<div class="emprightDiv"> <input type='submit' name="submit"  value='SAVE' />  
</br>
<INPUT type="reset">


</div>

</div>
</div>

</form>

</body>
</html> 

