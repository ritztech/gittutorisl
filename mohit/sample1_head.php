<!DOCTYPE html>


<html>
<head>
<style>
.btn {
  background:#964E06;
border-radius: 8px;
  font-family: Arial;
  color: #ffffff;
  font-size: 13px;
  padding: 5px 10px 5px 10px;
  text-decoration: none;
}

.btn:hover {
  background:#E9E2C5;
  color:#000000;
 
  text-decoration: none;
}




input:focus {
    /*background-color:#FF8448;*/
	background-color:orange;
	color: blue;
	font-weight:bold;
}

select:focus {
    background-color:#FF8448;
	color: black;
	font-weight:bold;
}

.btn {
  background:#561011;
border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 14px;
  padding: 5px 10px 5px 10px;
  text-decoration: none;
}

.btn:hover {
  background:#168C9B;
 
  text-decoration: none;
}


</style>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


  <link href="js/jquery-ui.css" rel="stylesheet">
  <script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
	  

<script>
   
     
	$.ctrl = function(key, callback, args) {
    $(document).keydown(function(e) {
        if(!args) args=[]; // IE barks when args is null 
        if(e.keyCode == key.charCodeAt(0) && e.ctrlKey) {
            callback.apply(this, args);
            return false;
        }
    });        
};



$.ctrl('1', function(s) {
    document.location.href = "bill_add_front_new.php";	
 //  myFunction();
});

$.ctrl('2', function(s) {
    document.location.href = "master_add_front.php";	
 //  myFunction();
});

$.ctrl('3', function(s) {
    document.location.href = "purchase_add_front.php";	
 //  myFunction();
});

$.ctrl('4', function(s) {
    document.location.href = "add_store_f.php";	
 //  myFunction();
});

$.ctrl('5', function(s) {
    document.location.href = "main_masters.php";	
 //  myFunction();
});


$.ctrl('6', function(s) {
    document.location.href = "report_summary.php";	
 //  myFunction();
});

$.ctrl('7', function(s) {
    document.location.href = "Report_today_sell.php";	
 //  myFunction();
});

$.ctrl('8', function(s) {
    document.location.href = "report_summary.php";	
 //  myFunction();
});



   
 </script>

 

</head>

<body style=" background-color:#FDFBFB; color:#000000; margin-top:0px; margin-left:0px; margin-right:0px;">


<div style="background-color:#B86B09; color:#FFFFFF; text-align:center">


<table  width="100%"  border="0" cellpadding="2" cellspacing="5">
<tr>
<td width="15%" align="left" >  <IMG SRC="ritz_logo.jpg"  WIDTH=auto	HEIGHT=70  > </td>

<td width="56%" align="left" >
  <h1 align="center" style="font-size:20px;">RITZ RETAIL  TECH  </h1></td>

<td width="21%" align="right">
<table width="200" border="0">
  <tr>
 <td align="right"><?php	  
	  session_start();
	  error_reporting(0); 
	  
if(!isset($_SESSION['uname'])) { header('Location: index.php'); }

echo " Welcome : " . $_SESSION['uname'];
echo "</br>";

?></td>
  </tr>
  <tr>
 <td><div align="right"><a style="color:#FFFFFF;" href="logout.php">LOGOUT</a></div></td>
  </tr>
</table>
</td>


</tr>
<tr>
<td colspan="4">

<?php	  
	
$id = $_SESSION['auth'];

if ($id == 'SUPER')
{?>

<table width="100%" border="1" frame="box" rules="none" align="center">
<tr>
<td><a href="welcome.php" target="_blank" ><span style="color:#F8F7F7;">**NEW COPY**</span></a></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="ADD BILL-1" ONCLICK="window.location.href='bill_add_front_new.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="ADD NEW ITEM-2" ONCLICK="window.location.href='master_add_front.php'"></td>

<td><INPUT class="btn" Type="BUTTON" VALUE="BARCODE" ONCLICK="window.location.href='purchase_add_front_barcode.php'"></td>


<td><INPUT class="btn" Type="BUTTON" VALUE="MRP  PURCHASE-3" ONCLICK="window.location.href='purchase_add_front.php'"></td>


<td><INPUT class="btn" Type="BUTTON" VALUE="MASTERS-5" ONCLICK="window.location.href='main_masters.php'"> </td>


<td><INPUT class="btn" Type="BUTTON" VALUE="REPORTS-6" ONCLICK="window.location.href='report_summary.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="PURCHASE" ONCLICK="window.location.href='add_store_f.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="TODAY SELL-7" ONCLICK="window.location.href='Report_today_sell.php'"></td>

<td><INPUT class="btn" Type="BUTTON" VALUE="RETURN-BILL-8" ONCLICK="window.location.href='bill_add_front_new_return.php'"></td>

<td><INPUT class="btn" Type="BUTTON" VALUE="EDIT ITEM" ONCLICK="window.location.href='search_bpey_type.php'"></td>




   </tr>
</table>
<?php } ?>

<?php


if ($id == 'ADMIN')
{?>

<table width="100%" border="1" frame="box" rules="none" align="center">
<tr>
<td><a href="welcome.php" target="_blank" ><span style="color:#F8F7F7;">**NEW COPY**</span></a></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="ADD BILL-1" ONCLICK="window.location.href='bill_add_front_new.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="ADD NEW ITEM-2" ONCLICK="window.location.href='master_add_front.php'"></td>

<td><INPUT class="btn" Type="BUTTON" VALUE="BARCODE" ONCLICK="window.location.href='purchase_add_front_barcode.php'"></td>


<td><INPUT class="btn" Type="BUTTON" VALUE="MRP  PURCHASE-3" ONCLICK="window.location.href='purchase_add_front.php'"></td>


<td><INPUT class="btn" Type="BUTTON" VALUE="MASTERS-5" ONCLICK="window.location.href='main_masters.php'"> </td>

<td><INPUT class="btn" Type="BUTTON" VALUE="REPORTS-6" ONCLICK="window.location.href='report_summary.php'"></td>

<td><INPUT class="btn" Type="BUTTON" VALUE="PURCHASE" ONCLICK="window.location.href='add_store_f.php'"></td>


<td><INPUT class="btn" Type="BUTTON" VALUE="TODAY SELL-7" ONCLICK="window.location.href='Report_today_sell.php'"></td>

<td><INPUT class="btn" Type="BUTTON" VALUE="RETURN-BILL-8" ONCLICK="window.location.href='bill_add_front_new_return.php'"></td>




   </tr>
</table>
<?php } ?>





<?php 
//for BILL
?>

<?php if ($id == 'BILL')
{?>
<table border="0" frame="box" rules="none" align="center">
<tr>



      <td><INPUT class="btn" Type="BUTTON" VALUE="ADD BILL" ONCLICK="window.location.href='bill_add_front_new.php'"/></td>
       <td><INPUT class="btn" Type="BUTTON" VALUE="RETURN-BILL" ONCLICK="window.location.href='bill_add_front_new_return.php'"/></td>
    </tr>
</table>
<?php } ?>

<?php if ($id == 'NORMAL')
{?>
<table border="0" frame="box" rules="none" align="center">
<tr>

<td><a href="welcome.php" target="_blank" ><span style="color:#F8F7F7;">**NEW COPY**</span></a></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="ADD BILL-1" ONCLICK="window.location.href='bill_add_front_new.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="ADD NEW ITEM-2" ONCLICK="window.location.href='master_add_front.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="BARCODE" ONCLICK="window.location.href='purchase_add_front_barcode.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="ADD  MRP  PURCHASE-3" ONCLICK="window.location.href='purchase_add_front.php'"></td>


<td><INPUT class="btn" Type="BUTTON" VALUE="MASTERS-5" ONCLICK="window.location.href='main_masters.php'"> </td>

<td><INPUT class="btn" Type="BUTTON" VALUE="REPORTS-6" ONCLICK="window.location.href='report_summary1.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="PURCHASE" ONCLICK="window.location.href='add_store_f.php'"></td>
<td><INPUT class="btn" Type="BUTTON" VALUE="TODAY SELL-7" ONCLICK="window.location.href='Report_today_sell1.php'"></td>

<td><INPUT class="btn" Type="BUTTON" VALUE="RETURN-BILL-8" ONCLICK="window.location.href='bill_add_front_new_return.php'"></td>

  

  </tr>
</table>
<?php } ?>


</td>
</tr>
</table>

</div>

</body>
</html> 