<?php
	// Beginning of XLS file
	function startWrite() {
    	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);  
    	return;
	}

	// End of XLS file
	function endWrite() {
    	echo pack("ss", 0x0A, 0x00);
    	return;
	}

	// Write Data - Numbers
	// (row no, col no, value)
	function writeNumber($row, $col, $number) {
    	echo pack("sssss", 0x203, 14, $row, $col, 0x0);
    	echo pack("d", $number);
    	return;
	}
	

	// Write Data - Strings
	// (row no, col no, string)
	function writeString($row, $col, $string ) {
    	$length = strlen($string);
    	echo pack("ssssss", 0x204, 8 + $length, $row, $col, 0x0, $length);
    	echo $string;
		return;
	}
	
	// Get current date
	$date = date("Y-m-d");
	// Send Header
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");;
	header("Content-Disposition: attachment;filename=playerInfo_$date.xls ");
	header("Content-Transfer-Encoding: binary ");
	
	// Start writing Excel file
	startWrite();
	// Writing the column headings
	writeString(0,0,"First Name");
	writeString(0,1,"Last Name");
	writeString(0,2,"Address");
	writeString(0,3,"Nationality");
	writeString(0,4,"Email");
	writeString(0,5,"City");
	writeString(0,6,"Profession");
	writeString(0,7,"Team");
	writeString(0,8,"Age");
	writeString(0,9,"Description");
	
	$row=1; 
	// Writing data under column headings
	writeString($row,0,"Rahul");
	writeString($row,1,"Dravid");
	writeString($row,2,"MG Road");
	writeString($row,3,"Indian");
	writeString($row,4,"rahul.dravid@gmail.com");
	writeString($row,5,"Banglore");
	writeString($row,6,"Criketer");
	writeString($row,7,"India");
	writeString($row,8,"40");
	writeString($row,9,"Batesman");
	
	$row=2;
	
	writeString($row,0,"Zinedin");
	writeString($row,1,"Zidan");
	writeString($row,2,"Wesselly Road");
	writeString($row,3,"France");
	writeString($row,4,"zinedin.zidan@gmail.com");
	writeString($row,5,"Paris");
	writeString($row,6,"Football");
	writeString($row,7,"France");
	writeString($row,8,"45");
	writeString($row,9,"Striker");
	
	// End writing Excel file
	endWrite();
	exit();
 
?>