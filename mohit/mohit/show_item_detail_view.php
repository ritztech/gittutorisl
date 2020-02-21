<?php

include ('sample1_head.php');
$refering_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

$id = $_GET['id'];

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>

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
	
	
 
function deleterecord_1(refid) {
	 
 
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
	location.reload(); 
	
	
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



</script>





</head>

<body>

<?php

include('config.php');


$t_date = date("d/m/Y");



$result13 = mysql_query("SELECT `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `dop`, `free_item`, `free_qty`, DATE_FORMAT(expdate,'%d/%m/%Y') as expdate, `batchno`, `purchase_id`, m1.id as id, `grp_id`, `catid`,weight,p1.name as cat_name FROM 
`m_master_store` m1,p_category p1 where p1.id = m1.catid   and grp_id = $id ");


?>




<form name = "form2" >

</br>


<h3 align="center"> ITEM RECORD</h3>
</br>

<p align="center">  <input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/>
<input type="button" name="CloseMe"  id = "CloseMe" value="Close Me" onClick="closeMe()"/> </p> 


<div id = "griddiv">


<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center" width="100%"  >
                          <tr style="background-color:#B86B09; color:#FFFFFF;">
						  <th>  SNO </th>
                                         <th>CATEGORY</th>										 
										 <th >ITEM  NAME </th>
										 
										 <th>WEIGHT</th>
										   <th  >QTY</th>
                                            <th >MRP</th>
                                            <th>PRICE</th>
											<th>BATCH NO</th>
											<th>BARCODE</th>
											<th>PURCHASE RECORD</th>
											<th>DELETE</th>
											
                                        </tr>
										
<?php

$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1;





 ?>
  
 <tr>
   <td>  <?php    echo $i   ?> </td>
      <td> <?php echo  $row13['cat_name'] ?>  </td>

<td style="width:201px;padding-left:10px;">
<a href="master_add_front_e.php?id=<?php echo  $row13['id']?> "> <?php echo  $row13['desc']?>  </a>

</td>
<td style="width:50px;"><?php  echo $row13['weight'];  ?></td>

<td style="width:50px;"><?php  echo $row13['qty'];  ?></td>
<td style="width:50px;"><?php  echo $row13['mrp'];  ?></td>
<td style="width:50px;"> <?php  echo $row13['s_price'];  ?></td>
<td style="width:100px;"> <?php  echo $row13['batchno'];  ?></td>

<td style="width:100px;"> <?php  echo $row13['barcode'];  ?></td>
<td style="width:150px;padding-left:10px;">
<a href="show_mrp_purchase.php?id=<?php echo  $row13['purchase_id']?> "> <?php echo  $row13['purchase_id']?>  </a>
</td>

<td><input type='button' name='btnprint' value='Delete' onclick='deleterecord_1("<?php echo  $row13['id'] ?>")'/></td>

</tr>
  
<?php  }   ?>
  
  

</table>


</div>

</br>


</div>






</div>
</div>
</div>

<script>
window.onload=document.form2.CloseMe.focus();
</script>

</form>


</div>
</div>
</div>


</body>
</html> 