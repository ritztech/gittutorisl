<?php

include ('/sample1_head.php');
include ('/sample1_left.php');
include("/config.php");

$id = $_GET['id'];

$result1 = mysql_query("SELECT `purchaseid`, DATE_FORMAT(p_date,'%d/%m/%Y') , `name`, `p_receipt`, `p_type`, `total`, `amount_paid`, `balance`, `p_notes`, `user_ent` 
FROM `purchase_invoice`,m_vendor
WHERE id = vendor_id  and  `purchaseid` = $id");
$row1 = mysql_fetch_array($result1);


$result13 = mysql_query("SELECT m_master_store.desc,sell_price,purchase_price,quantity,expiary,indiv_tot FROM purchase_item,m_master_store
WHERE ited_id = id  and  purchaseid = $id");



?>

<html>
<head>
<link rel="stylesheet" type="text/css" media="all" href="/css/try.css" />

<script language="javascript">

function happycode(){

document.form2.pbalance.value = document.form2.ptotal.value -  document.form2.ppaid.value

}

</script>


</head>

<body>
<div class = "head1" >
<div class = "center_page">


 

<form name = "form2" action = "Purchase_credit_page_back.php"  method = "post"   >


</br>
</br>

<div id="purchasecontainer"> 
</br>
<h3> PURCHASE DETAILS  </h3> 
</br>
</br>
<div>
	<div class="empleftDiv">Purchase_id:</div>
	<div class="emprightDiv"><input type = "text" size="15"  readonly name = "pid" value= <?php echo  $row1['0']?> id = "pid"/> </div>
</div>

<div>
	<div class="empleftDiv">Purchase_date:</div>
	<div class="emprightDiv"><input id="demo1" type = "text"  size="15"  name = "pdate" value= <?php echo  $row1['1']?> id = "pdate" />   </div>
</div>


<div>
	<div class="empleftDiv">Vendor name:</div>
	<div class="emprightDiv"><input type = "text" size="15"   name = "vname" value= "<?php echo  $row1['2']?>"  id = "pid"/> </div>
</div>

	 

<div>
	<div class="empleftDiv">Receipt No:</div>
	<div class="emprightDiv"><input type = "text" size="15"   name = "pct" value= <?php echo  $row1['3']?>  id = "pct"/></div>
</div>


<div>
	<div class="empleftDiv">CASH/CREDIT:</div>
	<div class="emprightDiv"><input type = "text" size="15"   name = "ptype" value= <?php echo  $row1['4']?>  id = "pct"/></div>
</div>


<div id="p2itemcontainer"> 
<div>
	<div class="empleftDiv">Total:</div>
	<div class="emprightDiv"><input type = "text"   name = "ptotal" value= <?php echo  $row1['5']?>  id = "ptotal"/></div>
</div>



<div>
	<div class="empleftDiv">Paid:</div>
	<div class="emprightDiv"><input type = "text" onChange="happycode()"   name = "ppaid" value= <?php echo  $row1['6']?>  id = "ppaid"/></div>
</div>
<div>
	<div class="empleftDiv">Balance:</div>
	<div class="emprightDiv"><input type = "text" name = "pbalance" value= <?php echo  $row1['7']?>  id = "pbalance"/></div>
</div>
<div>
	<div class="empleftDiv">Notes:</div>
	<div class="emprightDiv"><input type = "text" name = "pnotes" value= "<?php echo  $row1['8']?>" id = "pnotes"/></div>
</div>
<div>
	<div class="empleftDiv">User:</div>
	<div class="emprightDiv"><input type = "text" readonly name = "euser"  id = "euser"  value= <?php echo  $row1['9']?> " /></div>
</div>

</div>


</br>


<table border='1' cellpadding='1' frame="box"   >

<tr> <th> DESC </th>  <th> SELL PRICE </th> <th> PRICE </th>  <th> QTY </th> <th> EXPIARY </th>  <th> TOTAL </th> </tr> 


<?php
 
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   
   <td> <input type = "text" size="20" readonly name = "mastdesc<?php echo   $i ?>" value = "<?php echo  $row13['0'] ?>"  />  </td>
   <td> <input type = "text" size="13"          name = "sprice<?php echo   $i ?>" value = "<?php echo  $row13['1'] ?>"  />  </td>
   
   <td> <input type = "text"  size="6"    name = "price<?php echo   $i ?>" value = "<?php echo  $row13['2'] ?>"  />  </td>
   <td> <input type = "text" size="4"   name = "qty<?php echo   $i ?>" value = "<?php echo  $row13['3'] ?>" />  </td>
   
  <td> <input id="expiary<?php echo   $i ?>"  name = "expiary<?php echo   $i ?>"   type = "text"  size="15"  value = "<?php echo  $row13['4'] ?>" />  </td>
   
   <td> <input type = "text"  size="6" name = "total<?php echo   $i ?>" value = "<?php echo  $row13['5'] ?>" /> </td> 
   
 
</tr>


   
<?php  }	?>



</table>
</br>
</br>
<input type="submit" name="submit" value="SAVE">  

</div>



</div>
</div>
</div>
</br>


</form>


</div>
</div>
</div>


</body>
</html> 