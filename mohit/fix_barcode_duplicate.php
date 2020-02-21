<?php

include ('sample1_head.php');

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

</head>

<body>

<form name = "form1"  method="get"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


 <h3 align="center">  Fix Duplicate barcode </h3> 
	  
	 
<table align="center">
<tr>

<td>   

                <div class="label_div"><b>Input barcode: </b></div>  </td>  <td>
                        <div class="input_container">
               <input type="text" id="country_id"  autocomplete = "off" name="country_id"  />

                </div>
				
				

</td>
	
	 
<td> <input type="submit" name="submit" value="Get Details">  </td>

</tr>



</table>
</div>
</div>
</form>

<?php

include('config.php');

if(isset($_GET['submit']))
{

$bcode = $_GET['country_id'];


$result13 = mysql_query("SELECT `id`,`desc`,`barcode` FROM `m_master_store`   where barcode = '$bcode' ");



?>




<form  id="form2" name = "form2" method="post"    action="bill_add_back_bar_fix.php">

</br>



<table border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"    >

<tr> <th>  </th> <th> SNO </th>  <th> ITEM NAME  </th> <th> BARCODE </th>  </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td> <input type = "hidden" size="5" readonly name = "itemid<?php echo   $i ?>" value = "<?php echo  $row13['0'] ?>" />  </td>
   <td> <input type = "text" size="5" readonly name = "sno<?php echo   $i ?>" value = "<?php echo  $i ?>" />  </td>
   <td> <input type = "text" size="40"  name = "itemname<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="20"  name = "barcode<?php echo   $i ?>" value = "<?php echo  $row13['2'] ?>" />  </td>

    
</tr>


   
<?php  }	?>

<tr>  <td colspan = 4 align = "center"> <input type="submit" name="submit1" value="SAVE">  </td> </tr>
</table>

</br>

<input type = "hidden"  width="30" name = "totalcnt" id = "totalcnt" value=<?php echo   $i ?> /> 









</div>






</div>
</div>
</div>

<script>
window.onload=happycode ; 
</script>

</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 