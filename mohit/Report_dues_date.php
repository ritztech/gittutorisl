<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

  <link href="suggest_14/css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT LANGUAGE="JavaScript" src="suggest_14/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="suggest_14/js/script.js"></SCRIPT>
 


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


</br>

 

<table   width="40%"  border="2" align="center">

<tr>
    

		  
		  

  <td>  Search customer </td> <td>   

         	 <div id="holder"> 
		   <input type="text"   size = "25" autocomplete = "off"  id="keyword" name = "keyword" > 
		 </div>
		 <div id="ajax_response"></div>
		 
				

</td>

	
	 
		  
</tr>	



	
</table>	 


<input class = "noPrint" type = "text" name = "dstart"  id = "dstart"/>


</br>



</form>

<?php

if(isset($_GET['dstart']))
{
$cust_id = $_GET['dstart'];



 



$cust_net_p = mysql_query("select sum(`amount`)   from cust_pay where `cust_id` = $cust_id");
$cust_net_rec = mysql_fetch_array($cust_net_p);

$net_pay_cust = $cust_net_rec['0'];



$result12 = mysql_query("SELECT `id`, `name`, `contact`, `opd`, `p_bal`, `n_bal` FROM `m_customer` WHERE id = $cust_id");
$row12 = mysql_fetch_array($result12);

$cname= $row12['name'];
$opd= $row12['opd'];
$contact= $row12['contact'];
$tdues= round($row12['n_bal']);
$p_dues= round($row12['p_bal']);

$custpayu = 0;
$upaycust = 0;

if($tdues >= 0)
{
	$custpayu = $tdues;
}


else
{
	$upaycust = (0-$tdues) ;
}






?>



<form name = "form1" >

<div  align = "center"> 

<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/>
<INPUT  Type="BUTTON" VALUE="Get Money" ONCLICK="window.location.href='cust_get_front.php?dstart=<?php echo $cust_id  ?>'"/>


</div>

</br>
</br>


<div id = "griddiv">


   
<table  cellpadding='1' frame='box' bgcolor='white' border = '1' align="center" width="40%">
<tr> <td  style="background-color:#0A5066; color:#F7F5F5;"  colspan =3 , align = center>  <?php echo $cname  ?>    </td>   </tr>
<tr>  <td> DUE for <?php echo $cname  ?>  </td>  <td>  <?php  echo $custpayu  ?>    </td> </tr>
<tr>  <td> DUE  for you   </td>  <td> <?php  echo $upaycust  ?>     </td> </tr>


</table>

</br>
</br>



<table  cellpadding='1' frame='box' bgcolor='white' border = '1' align="center" width="40%">  
<tr > <td style="background-color:#0A5066; color:#F7F5F5;" > Opening Dues   </td> 

<td> <?php echo  $opd ?></td>


</tr>
<tr  > <td style="background-color:#0A5066; color:#F7F5F5;" > Purchase Due  </td>  <td><a   href="Report_purchase_due_summ.php?id= <?php echo  $cust_id ?> ">    <?php echo  $p_dues ?>   </a>  </td> </tr> 
<tr > <td style="background-color:#0A5066; color:#F7F5F5;" > Total payment Received   </td> <td><a   href="Report_purchase_pay_summ.php?id= <?php echo  $cust_id ?> ">    <?php echo  $net_pay_cust ?>   </a>  </td> </tr> 





</table>
 
</br>




</div>




</form>

<?php } ?>
</div>



</div>
</div>



</body>
</html> 