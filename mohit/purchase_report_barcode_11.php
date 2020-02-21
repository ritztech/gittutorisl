<?php

$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

?>

<html>
<head>

<STYLE>


page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;

}
page[size="A4"] {  
  width: 2in;
  height: 1in; 
}
page[size="A4"][layout="portrait"] {
  width: 2.1in;
  height: 1in;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

</STYLE>



<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

<script>


function jumpto(){

document.getElementById("ntable").deleteRow(0);
window.location='<?php echo  $refering_url  ?>';
	
window.print();
	
}

function closeMe(){


window.location='<?php echo  $refering_url  ?>';
	

}




</script>


</script>

</head>


<body>



<?php

include('config.php');

$compmnanwrrr = "GURUNANAK DRYFRUITS";



include('barcode/code128.class.php');
array_map('unlink', glob("1*.png"));

$j = $_POST['totalcnt'];


	?>
	
	<div id = "griddiv">
	<form  name = "form2"  id = "form2" >
	
	<page size="A1" layout="portrait">
	
	<table width="102%"   id="ntable">
		<tr>
<td  align = "center"> <input type="button"  id = "printtable" name="btnprint" value="Print" onClick="jumpto() "/> 
<input type="button" id = "printtable1" name="CloseMe" value="Close Me" onClick="closeMe('')"/> 
 </td>

</tr>

	
		  
	<?php

    $counter=0;
	$cells=0;
	$rowcr = 1;
	
for($i=1; $i <= $j; $i++) {
	
	
	$noofitem = $_POST['noofitem'.$i];
	$itemname = $_POST['mastdesc'.$i];
	$barcode = $_POST['barcode'.$i];
	$barcode1 = $barcode;
	$itemsprice = $_POST['itemsprice'.$i];
	$dsignno  = $_POST['dop'.$i];
	
	$weight  = $_POST['weight'.$i];
	
	
		$mastitem  = $_POST['mastitem'.$i];
		
	
	
	
	
	$sellprice  = $_POST['sellprice'.$i];
		$upstatus  = $_POST['upstatus'.$i];
		
		if($upstatus == 1)
		{
 $sqlinv_due = "UPDATE `m_master_store` SET `mrp` = $itemsprice, `s_price` = $sellprice  where  id = $mastitem ";
  //echo $sqlinv_due;
 mysql_query($sqlinv_due,$dbConn);
			
			
		}
	
	
	
	
	
		
	
	if ($barcode  == "") {	echo "<script>alert(' Barcode is empty');location.href='purchase_add_front_barcode.php'</script>";}
	
	$p_value = $barcode;
    $barcode = new phpCode128($p_value, 60, 'verdana.ttf', 8);
    $barcode->setEanStyle(false);
    $barcode->setShowText(false);
   $barcode->saveBarcode($p_value.'.png');
	

//	echo $noofitem;
		

	$data = range(1, $noofitem);
	
foreach($data as $value)
	
	{ 



?>
	
	
		
	<td valign=top   align="center"   style = "font-weight:bold;height: 60px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"   >
		<page size="A4" layout="portrait"> 

     <table   width = "100%" style = "font-weight:bold;" >
	 <tr>  <td align = "center" colspan = "2">  <font  size = "2">  GURUNANAK DRYFRUITS  </font>  </td>  </tr>
	 <tr>  <td  align = "center"  colspan = "2"  >  <font  size = "2">  <?php echo $itemname  ?></font>  </td>  </tr>

	 
<tr> <td  style="text-align:left; font-size:8px; font-weight:bold;" >  WEIGHT : <?php echo $weight  ?></br>
	MRP : <?php echo $itemsprice ?>  </br>
	DOP : <?php echo $dsignno  ?>  </br>
	BEST BEFORE 6 MONTHS </td>   <td>  <img src="<?php echo $p_value ?>.png" />  </td>  </tr>
	 
	 </table>



	
	
	
</page>	</td>
	
	



		
		
<?php	

		
			
	
	
	

	
	$cells=$cells+1;
	
	if($cells==1)
	{
	echo "</tr><tr>";
	$cells=0;
	if($rowcr ==2)
	{$rowcr = 0;}
	
	$rowcr = $rowcr +1;
		}
		
	  $counter=$counter+1;	 

	  
	  }




  
}

?>



	</tr>
	</table>
	
</page>
	
	</div>
	


</form>
</body>

<script>
window.onload=document.form2.printtable.focus();
</script>

</html>
