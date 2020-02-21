


<!DOCTYPE html>

<html>

<body>


<div class = "head1" >

<div class = "leftdiv">
</br>
<?php	  
	
$id = $_SESSION['auth'];

if ($id == 'NORMAL')
{?>


<b><a style = "color:red; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" href="welcome.php" target="_blank" >**NEW COPY**</a></b>
</br>
</br>

<b><INPUT class = "submenu"  Type="BUTTON" VALUE="ADD BILL" ONCLICK="window.location.href='bill_add_front.php'"> </b></br>

</br>

<b><INPUT class = "submenu"   Type="BUTTON" VALUE="ADD VEDNOR" ONCLICK="window.location.href='add_vendor_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="ADD ITEMS" ONCLICK="window.location.href='master_add_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="ADD PURCHASE" ONCLICK="window.location.href='purchase_add_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="SHORT-STOCK" ONCLICK="window.location.href='out_of_stock.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="RETURN-BILL" ONCLICK="window.location.href='Return_bill_front.php'"> </b></br>

<?php } ?>

<?php if ($id == 'SUPER')
{?>





<b><a style = "color:red; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" href="welcome.php" target="_blank" >**NEW COPY**</a></b>
</br>
</br>

<b><INPUT class = "submenu"  Type="BUTTON" VALUE="ADD BILL" ONCLICK="window.location.href='bill_add_front.php'"> </b></br>

</br>
<b><INPUT class = "submenu"    Type="BUTTON" VALUE="ADD USER" ONCLICK="window.location.href='add_user_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="ADD VEDNOR" ONCLICK="window.location.href='add_vendor_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="ADD ITEMS" ONCLICK="window.location.href='master_add_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="ADD PURCHASE" ONCLICK="window.location.href='purchase_add_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="SHORT-STOCK" ONCLICK="window.location.href='out_of_stock.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="ADD EXPENSES" ONCLICK="window.location.href='add_other_exp_front.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="REPORTS" ONCLICK="window.location.href='report_summary.php'"> </b></br></br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="TODAY SELL" ONCLICK="window.location.href='Report_today_sell.php'"> </b></br>
</br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="RETURN-BILL" ONCLICK="window.location.href='Return_bill_front.php'"> </b></br>
</br>
<b><INPUT class = "submenu"   Type="BUTTON" VALUE="EDIT MEDICINE" ONCLICK="window.location.href='ed_master_add_front.php'"> </b></br>





<?php } ?>









</div>

</div>


</body>
</html> 