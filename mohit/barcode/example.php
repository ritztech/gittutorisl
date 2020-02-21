<?php

include('code128.class.php');

$p_value = "mikeleigh.com.png";

$barcode = new phpCode128($p_value, 150, 'verdana.ttf', 18);
echo "call setEanStyle now";
$barcode->setEanStyle(false);
echo "call setShowText now";
$barcode->setShowText(false);
echo "call save barcode now";

$barcode->saveBarcode('5.png');

for($i=1; $i <= 5; $i++) {

echo "</br>";
echo "</br>";
echo "<img src='5.png'>";
echo "</br>";
echo "**** $p_value ****";

}


?>