<html>
<head>

<script>
function printform ()
{
	
//document.getElementById("mybutton").style.visibility = "hidden";
	
window.print();
document.location.href = "purchase_add_front_barcode.php";

}

</script>
<style>
@media print 
{
   @page
   {
 size: 8.57in 11.69in;
    size: portrait;
  }
}
</style>
</head>


<body>

</body>


</html>



<?php

include('barcode/code128.class.php');

$j = $_POST['totalcnt'];

	?>
	
	<table width="100%"  border = 1 align="center" >
	

	<tr>
		  
	<?php

    $counter=0;
	$cells=0;
	
for($i=1; $i <= $j; $i++) {
	
	$noofitem = $_POST['noofitem'.$i];
	$itemname = $_POST['mastdesc'.$i];
	$barcode = $_POST['barcode'.$i];
	$barcode_1 = $barcode;
	$itemsprice = $_POST['itemsprice'.$i];
	$dop = $_POST['dop'.$i];
	

	
	if ($dop == "00/00/0000 ") {	$dop = " ";}
	
	
	
	if ($barcode  == "") {	echo "<script>alert(' Barcode is empty');location.href='purchase_add_front_barcode.php'</script>";}
	
	$p_value = $barcode;
    $barcode = new phpCode128($p_value, 80,'c:\windows\fonts\verdana.ttf', 12);
    $barcode->setEanStyle(false);
    $barcode->setShowText(false);
    $barcode->saveBarcode($p_value.'.png');
	

		

	$data = range(1, $noofitem);
	
foreach($data as $value)
	
	{ ?>
	<td  width = "500" align="center" style = "color:black;font-weight:bold;" >
	
   
	
	
	
    <font size = 2.5 > <?php  echo $itemname  ?> </font> <br />
    <font size = 4> Price : <?php  echo $itemsprice ?>/- </font><br />                   
    <font size =2.5>PKD. <?php echo $dop  ?> B.B.60 DAYS  </font><br />
    <img src="<?php echo $p_value?>.png" width="250" height="30" /><br />
    <font  size = "1.5px"> <b> KHANDELWAL DEPARTMENTAL  </b>  </font><br />
        <font size = 2> City center GWL(cc0751 2232548) </font> <br />
	
	  
	
	<?php
	
	
	 	echo "</td>";
	$cells=$cells+1;
	if($cells==4)
	{
	echo "</tr><tr>";
	$cells=0;
	}
		
	  $counter=$counter+1;	 

	  
	  }




  
}

?>



	</tr>
	</table>
	





