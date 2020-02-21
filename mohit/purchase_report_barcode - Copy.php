<?php

$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

?>

<html>
<head>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

<script>

function jumpto(){

document.getElementById("ntable").deleteRow(0);
//document.location.href = "purchase_add_front.php";
	window.location='<?php echo  $refering_url  ?>';
window.print();
	
}

function closeMe()
{
window.location='<?php echo  $refering_url  ?>';

}

</script>

</head>


<body>



<?php

$compmnanwrrr = "RITZ";



include('barcode/code128.class.php');
array_map('unlink', glob("1*.png"));

$j = $_POST['totalcnt'];


	?>
	
	<div id = "griddiv">
	
	<table width="102%"   id="ntable">
		<tr>
<td  align = "center"> <input type="button"  id = "printtable" name="btnprint" value="Print" onClick="jumpto() "/>  </td>
<td  align = "center"> <input type="button" id = "printtable1" name="CloseMe" value="Close Me" onClick="closeMe('')"/> </td>
</tr>

	
		  
	<?php

    $counter=0;
	$cells=0;
	$rowcr = 1;
	
for($i=1; $i <= $j; $i++) {
	
	
	$noofitem = $_POST['qty'.$i];
	$itemname = $_POST['mastdesc'.$i];
	$barcode = $_POST['barcode'.$i];
	$barcode1 = $barcode;
	$itemsprice = $_POST['itemsprice'.$i];
	$dsignno  = $_POST['dop'.$i];
	
		
	
	if ($barcode  == "") {	echo "<script>alert(' Barcode is empty');location.href='purchase_add_front_barcode.php'</script>";}
	
	$p_value = $barcode;
    $barcode = new phpCode128($p_value, 65, 'verdana.ttf', 8);
    $barcode->setEanStyle(false);
    $barcode->setShowText(false);
   $barcode->saveBarcode($p_value.'.png');
	

		

	$data = range(1, $noofitem);
	
foreach($data as $value)
	
	{ 


if($rowcr == 2)
	
	{








	if($cells == 2  || $cells == 3  )
	{ ?>
	
	
	
	
		
		<td valign=top width="150"  align=right   >
	</br>	

<table width="150" border="1"    style="margin-right:-35px;"  cellspacing = "0">
<TR><td colspan="2"  align="center" height = "22px"  > <b style="font-size:14px;"> <?php echo $compmnanwrrr  ?> </b> </td></TR>
  <tr>
  
     <td>
	
	<table width="100%" border="0"  >
   <tr>
    <td >
	<b>DOP</b> : <b><?php    echo $dsignno ?> </b><br />
	 <br />
   <b><?php echo $itemname ?></b><br />
	
	
	
	 <u><b>MRP</b></u>
	 <b  style="text-transform:lowercase"><?php echo $itemsprice ?>/-</b>
	
	<span style="font-size:6px;" >(incl of all  taxes)</span>
	
	</td>
  </tr>
   <tr>
    <td colspan="2"  align="center" >
	<img src="<?php echo $p_value ?>.png" />
	</td>
  </tr>
  
  
</table>
	
	
	</td>
  </tr>
  
 
   
</table>

</br>


</td>



<?php
	}
	
	else
		
	
	{  ?>
		
		
		<td valign=top width="150"  align=center   >
		</br>

<table width="150" border="1"     cellspacing = "0">
<TR><td colspan="2"  align="center" height = "22px"  > <b style="font-size:14px;"> <?php echo $compmnanwrrr  ?> </b> </td></TR>
  <tr>
  
     <td>
	
	<table width="100%" border="0"  >
   <tr>
    <td >
	<b>DOP</b> : <b><?php    echo $dsignno ?> </b><br />
	 <br />
	 <b><?php echo $itemname ?></b><br />
	
	
	
	 <u><b>MRP</b></u>
	 <b  style="text-transform:lowercase"><?php echo $itemsprice ?>/-</b>
	
	<span style="font-size:6px;" >(incl of all  taxes)</span>
	
	</td>
  </tr>
   <tr>
    <td colspan="2"  align="center" >
	<img src="<?php echo $p_value ?>.png" />
	</td>
  </tr>
  
  
</table>
	
	
	</td>
  </tr>
  
 
   
</table>


</td>

		
		
		
		
<?php	}


	}
	
	else
		
		{
			
			






	if($cells == 2  || $cells == 3  )
	{ ?>
	
	
	
	
		
		<td valign=top width="150"  align=right   >

<table width="150" border="1"    style="margin-right:-35px;"  cellspacing = "0">
<TR><td colspan="2"  align="center" height = "22px"  > <b style="font-size:14px;"> <?php echo $compmnanwrrr  ?> </b> </td></TR>
  <tr>
  
     <td>
	
	<table width="100%" border="0"  >
   <tr>
    <td >
	<b>DOP</b> : <b><?php    echo $dsignno ?> </b><br />
	 <br />
   <b><?php echo $itemname ?></b><br />
	
	
	
	 <u><b>MRP</b></u>
	 <b  style="text-transform:lowercase"><?php echo $itemsprice ?>/-</b>
	
	<span style="font-size:6px;" >(incl of all  taxes)</span>
	
	</td>
  </tr>
   <tr>
    <td colspan="2"  align="center" >
	<img src="<?php echo $p_value ?>.png" />
	</td>
  </tr>
  
  
</table>
	
	
	</td>
  </tr>
  
 
   
</table>

</td>



<?php
	}
	
	else
		
	
	{  ?>
		
		
		<td valign=top width="150"  align=center   >

<table width="150" border="1"     cellspacing = "0">
<TR><td colspan="2"  align="center"  height = "22px"  > <b style="font-size:14px;"> <?php echo $compmnanwrrr  ?> </b> </td></TR>
  <tr>
  
     <td>
	
	<table width="100%" border="0"  >
   <tr>
    <td >
	<b>DOP</b> : <b><?php    echo $dsignno ?> </b><br />
	 <br />
	 <b><?php echo $itemname ?></b><br />
	
	
	
	 <u><b>MRP</b></u>
	 <b  style="text-transform:lowercase"><?php echo $itemsprice ?>/-</b>
	
	<span style="font-size:6px;" >(incl of all  taxes)</span>
	
	</td>
  </tr>
   <tr>
    <td colspan="2"  align="center" >
	<img src="<?php echo $p_value ?>.png" />
	</td>
  </tr>
  
  
</table>
	
	
	</td>
  </tr>
  
 
   
</table>


</td>

		
		
		
		
<?php	}

			
			
		}
	
	

	
	$cells=$cells+1;
	
	if($cells==4)
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
	



</body>


</html>
