
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
//document.location.href = "purchase_add_front.php";
	
window.print();
	
}



</script>

</head>


<body>


<form  name = "form2"  id = "form2" >




<?php

$compmnanwrrr = "GURUNANAK DRYFRUITS";



include('barcode/code128.class.php');
array_map('unlink', glob("1*.png"));

$j =1;


	?>
	
	<div id = "griddiv">
	
	
	
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
	
	
	$noofitem = 2;
	$itemname = "PRODUCT NAME";
	$barcode = "1111111";
	$barcode1 = $barcode;
	$itemsprice = "100";
	$dsignno  = "111111";
	
		
	
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
	 <tr>  <td  align = "center"  colspan = "2"  >  <font  size = "2">  PRODUCT NAME </font>  </td>  </tr>

	 
<tr> <td  style="text-align:left; font-size:8px; font-weight:bold;" >  WEIGHT : 250 GM</br>
	MRP : <?php echo $itemsprice ?>  </br>
	DOP : 10/09/2016   </br>
	BEST BEFORE 6 MONTHS </td>   <td>  <img src="<?php echo $p_value ?>.png" />  </td>  </tr>
	 
	 </table>



	
	
	
</page>	</td>
	
	



		
		
<?php	

		
			
	
	
	

	
	$cells=$cells+1;
	
	if($cells==1)  // Number of columns 
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
	

	
	
	</div>
	


</form>
</body>

<script>
window.onload=document.form2.printtable.focus();
</script>



</html>
