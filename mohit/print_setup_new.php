
<html>
<head>




<style>


page {
  background: white;
  display: block;
  margin: 0 auto;
  
}

page[size="A4"] {  
  width: 2.15in;
  height: 1.5in; 
}
page[size="A4"][layout="portrait"] {
  width: 2.15in;
  height: 1.5in; 
}


.main {
  font-family:Arial,Verdana,sans-serif;

}


</style>

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

$compmnanwrrr = "GURUNANAK ";



include('barcode/code128.class.php');
array_map('unlink', glob("1*.png"));

$j =1;


	?>
	
	
	
	<table  class="main"   align = "center"  id="ntable"  cellspacing = "0"  >
	
	<tr>


	
		  
	<?php

    $counter=0;
	$cells=0;
	$rowcr = 1;
	
for($i=1; $i <= $j; $i++) {
	
	
	$noofitem = 8;
	$itemname = "PRODUCT NAME";
	$barcode = "1111111";
	$barcode1 = $barcode;
	$itemsprice = "100";
	$dsignno  = "111111";
	
		
	
	if ($barcode  == "") {	echo "<script>alert(' Barcode is empty');location.href='purchase_add_front_barcode.php'</script>";}
	
	$p_value = $barcode;
    $barcode = new phpCode128($p_value, 60, 'verdana.ttf', 6);
    $barcode->setEanStyle(false);
    $barcode->setShowText(false);
   $barcode->saveBarcode($p_value.'.png');
	

//	echo $noofitem;
		

	$data = range(1, $noofitem);
	
foreach($data as $value)
	
	{ 



?>
	
	
		
		<td  align="left"  style = "font-weight:bold;height: 60px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  >
		<page size="A4" layout="portrait"> 

		<TABLE   width = "100%"  style = "font-weight:bold;"  >
                  <tr>        <td colspan = "2", align = "center">   <font  size = "2"> SIDDH EMPORIUM   </font> </td>     <tr>
				  <tr > <td  align = "left"> <b><font  size = "1">SIZE</font></b>  </td>  <td align = "right"> <font  size = "1">30 </font> </td> </tr>
				   <tr> <td align = "left"> <b><font  size = "1">SHADE</font></b>  </td>  <td  align = "right"><b><font  size = "1">BLUE/DEPIC</font></b>  </td> </tr>
				    <tr> <td  align = "left"><b><font  size = "1">D.NO.</font></b>   </td>  <td  align = "right"><b><font  size = "1">20202</font></b>  </td> </tr>
					 <tr> <td  align = "left"> </b><font  size = "1">M.R.P. </font></b>  </td>  <td  align = "right"> <b><font  size = "1">1290</font></b>  </td> </tr>
					 	<tr>  <td  align = "center" colspan = "2">  <img src="<?php echo $p_value ?>.png" />  </td>  </tr>
											 	<tr>  <td  align = "center" colspan = "2">  <?php   echo $p_value ?> </td>  </tr>

					 
	</table>
</page> 	</td>  


 	
	
			
<?php	

		
			
	
	
	

	
	$cells=$cells+1;
	
	if($cells==2)  // Number of columns 
	{
	echo "</tr> <tr>";
	$cells=0;

		}
		
	  
	  }




  
}

?>



	</tr>
	</table>
	



</form>
</body>

<script>
window.onload=document.form2.printtable.focus();
</script>



</html>
