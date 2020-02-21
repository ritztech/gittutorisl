<?php
session_start();
header ('Last-Modified: '.gmdate("D, d M Y H:i ").' GMT');  
header ('Expires: '.gmdate("D, d M Y H:i ").' GMT');  
header ('Cache-Control: no-cache, must-revalidate');  
header ('Pragma: no-cache');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="MSThemeCompatible" content="no" />
<title>Poldata</title>
<link href="ie.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<table width="567" border="0" cellspacing="4" cellpadding="4">
    	<tr align="left" bgcolor="#FFFFFF"> 
			<form name="export_brand" action="export_data.php" method="post">
            	<td width="131"><strong>Export Data to Excel File</strong></td>
                <td width="408" height="55"><input type="submit" name="btnUpdate" tabindex="1" value="Export" class="button"></td>
			</form>
        </tr>
	</table>
</body>
</html>
