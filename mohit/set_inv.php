<?php

/*
add nbillno new    files
update billno into this filed


drop bill no

ALTER TABLE `sell_invoice` ADD `billno` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ;


run below query

again update nbil from bill no


drop billl no

rename nbill no to billno

ALTER TABLE `sell_invoice` CHANGE `nbillno` `billno` INT(11) NOT NULL;

*/


include('config.php');

$result13 = mysql_query("SELECT `old_billno`,`billno`  FROM `sell_invoice` ");

while($row13 = mysql_fetch_array($result13))
  {
	  $old_bill = $row13['0'];
	  $n_bill_n = $row13['1'];
	  
	  
	  $sqlinv = "UPDATE `sell_items` SET `billno`=  $n_bill_n  where billno =  $old_bill ";
 
 
mysql_query($sqlinv,$dbConn);

	  
  
  }

?>