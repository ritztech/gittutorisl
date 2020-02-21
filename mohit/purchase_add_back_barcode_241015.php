<?php

include('barcode/code128.class.php');

$j = $_POST['totalcnt'];



for($i=1; $i <= $j; $i++) {
	
	
	$noofitem = $_POST['noofitem'.$i];
	$itemname = $_POST['mastdesc'.$i];
	$barcode = $_POST['barcode'.$i];
	$itemsprice = $_POST['itemsprice'.$i];
	$dop = $_POST['dop'.$i];
	
	if ($dop == "00/00/0000 ") {	$dop = " ";}
	
	
	if ($barcode  == "") {	echo "<script>alert(' Barcode is empty');location.href='purchase_add_front_barcode.php'</script>";}
	
	
	
	
	$p_value = $barcode;
    $barcode = new phpCode128($p_value, 70, 'c:\windows\fonts\verdana.ttf', 12);
    $barcode->setEanStyle(false);
    $barcode->setShowText(false);
    $barcode->saveBarcode('5.png');
	
	?>
	
	
<table>
		<tr>
	
	
	<?php 
	
	$data = range(1, $noofitem);
$counter = 1;

foreach($data as $value){
	
	
	    if (!(($counter++ ) % 5)){
		
		
        echo "<td style='width:15%;' >$itemname </br><img src='5.png'>   </br> MRP : $itemsprice  , MFD : $dop , BB 6 Months   Khandelwal departmental , City center  GWL , </br> Customer care no : 0751 2232548 </td></tr><tr>";
    }else{
        echo "<td style='width:15%;' >$itemname </br><img src='5.png'>   </br> MRP : $itemsprice  , MFD : $dop , BB 6 Months   Khandelwal departmental , City center  GWL , </br> Customer care no : 0751 2232548 </td>";
    }
}


	
	?>
	</tr>
		  </table>
	
	
	
	
		  

	


<?php
  
}

?>

<html>
<head>

<script>
function printform ()
{
	
document.getElementById("mybutton").style.visibility = "hidden";
	
window.print()

}

</script>

</head>


<body>
</br>

<input id = "mybutton" type="button" onclick="printform()" value="PRINT"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" >

</body>


</html>















