<html>
<head>

<script language="javascript" type="text/javascript" >
function jumpto(selectedURL){
if (document.navForm.jumpmenu.value != "null")
	{
		var confirmLeave = confirm('Are you sure you want to leave the Quackit website?');
		if (confirmLeave==true)
		{
			document.location.href = "http://localhost/xampp/test/login/Medical/login.php"
		}
		else
		{
			document.location.href = "http://localhost/xampp/test/login/Restaurants/login.php";
		}
	}
}
</script>

</head>
<body>

<p>Visit one of these excellent websites:</p>
<form name="navForm">
<select name="jumpmenu" onChange="jumpto(document.navForm.jumpmenu.options[document.navForm.jumpmenu.options.selectedIndex].value)">
	<option>Jump to...</option>
	<option value="http://localhost/xampp/test/login/Medical/login.php">Medical</option>
	<option value="http://localhost/xampp/test/login/Restaurants/login.php">Rest</option>
	</select>
</form>


</body>
</html>
