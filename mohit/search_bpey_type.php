<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");



?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/bill_items.js">  </script>
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

  <link href="suggest_17/css/style.css" rel="stylesheet" type="text/css">
  <SCRIPT LANGUAGE="JavaScript" src="suggest_17/js/jquery.js"></SCRIPT>
 <SCRIPT LANGUAGE="JavaScript" src="suggest_17/js/script.js"></SCRIPT>
 
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
	
	
 
function deleterecord_1(refid,rownoiii) {
	 
	 
	// alert(rownoiii);
 
 var scr1= "delete_master_item.php";
	

    if (confirm("Are you sure you want to delete this item ...  ?!") == true) {
		
		
	     	var strURL=scr1+"?id="+refid;
			
		//	var strURL="scr1?id="+deleteId;
			
			
		//	alert(strURL);
			
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	
	
	  var row = rownoiii.parentNode.parentNode;
      row.parentNode.removeChild(row);
	
		 
	
	//   var table = document.getElementById('mytable');
	   
	//   alert(rownoiii);
//	var rowCount = table.rows.length;
	
	//alert(rowCount);
	
	// alert(rownoiii);
	   
	  // table.deleteRow(rownoiii);
	   
	   
	//location.reload(); 
	
	
	} else {
        x = "You pressed Cancel!";
    }
	


				 
}







function closeMe()
{

//document.location.href = "Report_today_sell.php";
//window.location='<?php echo  $refering_url  ?>';

window.history.back();

}

function updatemrp(refid,rowposz) {
	

var mrpval = document.form2[ "mrptext" + rowposz ].value;
var sprice = document.form2[ "sprice" + rowposz ].value;
var taxtype = document.form2[ "taxtype" + rowposz ].value;





//alert(mrpval);
	 
	passparam_value = refid+','+mrpval+','+sprice+','+taxtype;
	
 
 var scr1= "update_mrp_price.php";
	

		
	     	var strURL=scr1+"?id="+passparam_value;

			
			
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		

				 
}


</script>


</head>

<body>




<form id = "form2"  name = "form2" method="post" action="bill_add_back.php">


<?php


include('config.php');

$t_date = date("d/m/Y");

$query_dispMake1="SELECT `did`,`dname` FROM `doc_master`  where did!=1 ";
$result_dispMake1=mysql_query($query_dispMake1);



?>


</br>
</br>



<table width="100%" cellspacing="5" bgcolor = "white" cellpadding="5" border="3" align="center">
		<tr>
			 <td align = "center"> 
         	SEARCH :  <div id="holder" ><input type="text" placeholder="Search item"  tabindex = "1" autofocus   size = "20" autocomplete = "off"  id="keyword"  name = "keyword" > 
		 		 
		 </div> 

		 


</td>

<tr>
<td>  		 <div id="ajax_response"></div>
		 
		 <div id="ajax_response1">  
		 
		 		 </div>
		


</body>
</html> 