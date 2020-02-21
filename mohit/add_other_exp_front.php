<?php

include ('sample1_head.php');
include ('sample1_left.php');

$t_date = date("d/m/Y");



?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

<script language="javascript">
function expensevalid(){
if( document.form1.expt.value == "" )
   {
     alert( "Please fill expense type!" );
     document.form1.expt.focus() ;
     return false;
   }
   
 if( document.form1.edate.value == "" )
   {
     alert( "Please fill expense date!" );
     document.form1.edate.focus() ;
     return false;
   }
   
 if( document.form1.eamount.value == "" )
   {
     alert( "Please fill expense amount!" );
     document.form1.eamount.focus() ;
     return false;
   }
     
     

return true 

}

</script>


<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
</head>

<body>
 
<form  name = "form1" action = "add_other_exp_back.php"  method = "post"  onSubmit="return expensevalid()" >

<div class = "head1" >
<div class = "center_page">



<div  style="margin-left:30%;">  



<div > <font color="blue"> <h3> ADD NEW EXPENSE </h3>  </font> </div>
</br>
<div>
	<div class="empleftDiv">EXPENSE TYPE:</div>
	<div class="emprightDiv"><input type = "text" size="20"  name = "expt" id = "expt"/></div>
</div>

<div>
	<div class="empleftDiv">EXPENSE DATE:</div>
	<div class="emprightDiv"><input id="demo1" type = "text"  size="20" value= <?php echo  $t_date ?>  name = "edate"  id = "pdate" />  <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>
	
</div>

<div>
	<div class="empleftDiv">AMOUNT:</div>
	<div class="emprightDiv"><input type = "text" name = "eamount" size="20"   id = "eamount"/></div>
</div>

<div>
	<div class="empleftDiv">REMARKS:</div>
	<div class="emprightDiv"><textarea rows="4" cols="20"  name="inputtext"> Nothing </textarea> </div>
</div>



</br>


<div class="emprightDiv"> <input type='submit' value='AddRecord' />  
</br>
<INPUT type="reset">


</div>

 



</div>
</div>
</form>

</body>
</html> 