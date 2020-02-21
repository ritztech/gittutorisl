<?php

include("../config.php");


$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'-', `capacity`,'-', `cmp_name`,'-', qty,'-',`storage`)) AS `desc` FROM `m_master_store`order by 2";
$result_dispMake=mysql_query($query_dispMake);

?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/bill_items.js">  </script>

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
	

function getDistrict(provinceId) {		
	var strURL="findDistrict.php?province="+provinceId;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {						
					document.getElementById('districtdiv').innerHTML=req.responseText;
					document.getElementById('communediv').innerHTML=req.responseText;					
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}



function h123(str)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	var arfruits = fruits.split(',');
	
 
document.form1.uname.value = arfruits[0];
document.form1.uadr.value = arfruits[1];
document.form1.ucontact.value = arfruits[2];
document.form1.dname.value = arfruits[3];

	
    }
  }
xmlhttp.open("GET","get_master_item.php?q="+str,true);
xmlhttp.send();



}



</script>
</head>

<body>

<form name = "form1" method="post" action="bill_add_back.php">


<table   width="100%" cellspacing="5" cellpadding="2" border="2"  >

<tr>

   <td> SELECT MEDICINE </td> <td> <select  onChange="getDistrict(this.value)"  name="province" id="province" >
	<option   value="" selected="selected"> </option>
	<?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['id']}>{$query_data['desc']}  </option>"; 

	 }
	 ?> </select> </td>  
	 <td>  </td>

</tr>	

          	<tr>
            	<td class="pull-right"><label for="district" class="pull-right">Districe :</label></td>
            	<td><div id="districtdiv">
                    	<select name="district" class="form-control" >
                        	<option>&larr; Select District &rarr;</option>
                    	</select>
                	</div>
            	</td>
          	</tr>
			
	
</table>

</br>
</br>


<table >
  <tr>
    <td>NAME</td>  <td> <input type = "text" name = "uname"   id = "uname" /> </td>
  </tr>
  <tr>
    <td>ADDRESS</td>  <td><input type = "text" name = "uadr" id = "uadr" /> </td>
  </tr>
    <tr>
    <td>CONTACT</td>  <td> <input type = "text" name = "ucontact"  id = "ucontact" /> </td>
  </tr>
  <tr>
    <td>DR NAME</td>  <td><input type = "text" name = "dname"  id = "dname" /> </td>
  </tr>
</table>



</form>


</body>

</html>
