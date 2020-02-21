<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

  <link href="suggest_14/css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT LANGUAGE="JavaScript" src="suggest_14/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="suggest_14/js/script.js"></SCRIPT>
 <script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
 


<script language="javascript">



function h123(str)
{
	
	document.form2.dstart.value  = str;
	document.getElementById("form2").submit();
	  document.form2.keyword.value = "";
               document.form2.keyword.focus();
			   
			   
}


function myFunction()
{
	
if( document.form2.totalcnt.value == "" )
   {
     alert( "Please add an item amount!" );
    // document.form2.ppaid.focus() ;
     return false;
   }
   
	
document.getElementById("form2").submit();
	
}




</script>

</head>

<body>


<form name = "form2"  id = "form2"  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<BR><BR>

<table   width="30%"  border="2" align="center"  >

<tr>
    

		  
		  

  <td>  Search customer </td> <td>   

         	 <div id="holder"> 
		   <input type="text"   size = "15"  tabIndex = "1" tabIndex="1"  autocomplete = "off"  id="keyword" name = "keyword" > 
		 </div>
		 <div id="ajax_response"></div>
		 
				

</td>

	
	 
		  
</tr>	



	
</table>	 


<input class = "noPrint" type = "text" name = "dstart"  id = "dstart"/>





</br>


















</br>

</br>



</form>

<?php

if(isset($_GET['dstart']))
{
$cust_id = $_GET['dstart'];

$result12 = mysql_query("SELECT `id`, `name` FROM `m_customer` where id = $cust_id");
$row12 = mysql_fetch_array($result12);

$cname= $row12['name'];
$t_date = date("d/m/Y");

?>





<form name = "form1" method="post" action="cust_get_bck.php">

<table width="40%" cellspacing="5" cellpadding="2" border="2" align="center" >

<tr> <td width="20%" > Customer name:  </td>  <td width="2%" > <input type = "text" size="40"  readonly  value = "<?php  echo $cname ?>"  name = "cname" id = "cname"/> </td>   </tr>
<tr> <td> Pay Date </td>  <td> <input type = "text" size="30"  onchange = "isDate(this.value)"  value = "<?php echo $t_date ?>" name = "expdate"  id = "expdate"/> <a href="javascript:NewCal('expdate','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>  </td>   </tr> 

<tr> <td> Amount paid : </td>  <td> <input type = "text"  tabIndex = "2"  autocomplete = "off" size="40" required = "required" name = "mrp" id = "mrp"/>  </td>   </tr>

<tr> <td> Remark: </td>  <td> <input type = "text" size="40"  tabIndex = "3"  name = "sprice" id = "sprice"/>  </td>   </tr>


<tr> <td  style="text-align:center" colspan="2"  > <input type='submit'    tabIndex = "4"  value='SAVE' />  </td>   </tr>




</table>


<input type = "hidden"  name = "cust_id"  value = "<?php echo $cust_id  ?>"id = "cust_id"/>


</form>

<?php } ?>
</div>



</div>
</div>



</body>
</html> 