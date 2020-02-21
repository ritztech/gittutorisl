<?php

include ('sample1_head.php');
include ('sample1_left.php');
include("config.php");

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

<script language="javascript">

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	

function deleterecord(deleteId) {
	
	//alert(deleteId);
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="delete_doctor.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='add_doc_master_front.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>

</head>

<body>
 
<form  name = "form1" action = "add_doc_master_back.php"  method = "post" >

<div class = "head1" >
<div class = "center_page">




</br>


<div class="emprightDiv"> 
</br>



</div>

 
<div id="menu" style="height:200px;width:300px;float:left;margin:1% 10px 20px 300px;">

<table border='1' cellpadding='3' >

<tr> <td> NAME  </td>   <td> CONTACT  </td>  <td> CITY </td>  <td> ADDRESS  </td>  </tr>
<tr>  <td><input type = "text" size = "25" name = "dname" id = "dname"/>  </td>
        <td><input type = "text" size = "12" name = "dcontact" id = "dcontact"/>  </td>
		 <td><input type = "text" size = "15" name = "cityname" id = "cityname"/>  </td>
		  <td><input type = "text" size = "40" name = "daddress" id = "daddress"/>  </td>
		  


</tr>
<tr> <td> <input type='submit' value='AddRecord' /> </td>  </tr>
 
  

</table>



<font color="blue"> <h2> EXISTING  CUSTOMER LIST  </h2> </font> 

<table border='1' cellpadding='3' >
<tr>
<tr> <th> Name  </th>  <th> City </th> <th> Contact </th> <th> Address </th>  <th> Edit  </th> <th> DELETE  </th>  </tr>

<?php
$result13 = mysql_query("SELECT `dname`, `cityname`,`dcontact`, `daddress`,  `did` FROM `doc_master` WHERE 1");
while($row13 = mysql_fetch_array($result13))
{ ?>
<tr>
<td> <input type = "text" size = "25"  readonly name = "nuid" size = "40" value = "<?php echo $row13['0'] ?>"/> </td>	
<td> <input type = "text" size = "10"  readonly name = "nuid" size = "15" value = "<?php echo $row13['1'] ?>"/> </td>	
<td> <input type = "text" size = "10" readonly name = "nname" size = "15" value = "<?php echo $row13['2'] ?>"/> </td>
<td> <input type = "text"  size = "20" readonly name = "npassword" size = "40" value = "<?php echo $row13['3'] ?>"/> </td>
<td><b><font color="#663300"><a href="edit_doctor_master.php?id=<?php echo $row13['4']?>">Edit</a></font></b></td>
 <td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord(<?php echo $row13['4']?>)'/></td>
</tr>

 <?php  }	?>


</table>



<div>



</div>
</div>
</form>

</body>
</html> 