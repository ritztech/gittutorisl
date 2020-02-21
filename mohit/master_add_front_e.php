<?php

include ('sample1_head.php');

$id = $_GET['id'];

include("config.php");


$query_dispMake="SELECT `itemid`,upper(itemname) AS `desc` FROM `m_item_store` order by 2 ";
$result_color=mysql_query($query_dispMake);

$query_sales="SELECT `id`,upper(CONCAT(`name`)) AS `name` FROM p_category";
$result_sales=mysql_query($query_sales);



$result1 = mysql_query("SELECT `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, DATE_FORMAT(dop,'%d/%m/%Y')  as  dop,
 `free_item`, `free_qty`, DATE_FORMAT(expdate,'%d/%m/%Y')  as  expdate, `batchno`, `purchase_id`, `id`, `grp_id`, 
 `catid`,weight,tax_type FROM `m_master_store` WHERE id = $id");
 $row1 = mysql_fetch_array($result1);
 
 
 $vend_1 = $row1['catid'];
 
 $result13 = mysql_query("SELECT  `c_id`, `c_name`, `qty`, `unit` FROM `food_child` WHERE food_id = $id");
 
 


 
 
 $result2 = mysql_query("SELECT id ,`name`FROM `p_category` where id =  $vend_1 ");

 $row2 = mysql_fetch_array($result2);
 
 $v_cat = $row2['1'];
 if($vend_1 == "0")
 {
	 $v_cat = "GENERAL";
	 
 }
 
 

?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/food_items.js"> </script>


   <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
	  

<script language="javascript">

function myFunction()
{
document.getElementById("form2").submit();
	
}

function getbarcode(str)
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
		
	//alert (fruits);
	document.form2.barcode.value  = fruits;
  
    }
  }
xmlhttp.open("GET","get_barcode.php?q="+str,true);
xmlhttp.send();
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
	
	
	
	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[2]);
document.form2.keyword.value = "";
document.form2.keyword.focus();

	
    }
  }
xmlhttp.open("GET","get_purchase_item_s.php?q="+str,true);
xmlhttp.send();



}


   $(function() {
       		 
  		$(".auto").autocomplete({
					 
            minLength: 0,
            source: "search_v.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			 // $( ".auto" ).val( ui.item.label );
               $( "#custid" ).val( ui.item.value);
			   $( "#custcon" ).val( ui.item.desc);
			 //  $( "#cname" ).val( ui.item.desc1);
			   
			   
             //  $( "#project-description" ).html( ui.item.desc );
			   
			 //  alert(ui.item.value);
			 		 document.form2.keyword.focus() ;
			   
			 
			   
               return false;
            }
         }
		 
)


 		$(".auto123").autocomplete({
					 
            minLength: 0,
            source: "search_items.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			 // $( ".auto" ).val( ui.item.label );
             //  $( "#custid" ).val( ui.item.value);
			  // $( "#netdueamt" ).val( ui.item.desc);
			 //  $( "#cname" ).val( ui.item.desc1);
			   
			   
             //  $( "#project-description" ).html( ui.item.desc );
			   
			   //alert(ui.item.value);
			   h123(ui.item.value);
			 	
			   
			 
			   
               return false;
            }
         }
		 
)


		 
		 
         .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
         };
         });
		 
		 

		 
		 document.addEventListener('keydown', (event) => {
  const keyName = event.key;
  
 // alert(keyName);

  if(keyName == "F1")
  {
	 	 myFunction();
		  
		  
	  
  }

  }, false);
  


</script>


</head>

<body>
 
<form  id="form2" name = "form2" action = "master_add_back_e.php"  method = "post" >



<div>  

 <h3 align="center"> UPDATE ITEM MASTER  </h3>  


<table  cellspacing="5" cellpadding="2" border="2" align="center" >

<tr>   <td    colspan = "2" > DESCRIPTION: : <input type = "text" size="50" value = "<?php echo $row1['desc']  ?>"  name = "desc" id = "desc"/>
GST% : : <input type = "text" size="10" value = "<?php echo $row1['tax_type']  ?>"   name = "gstper" id = "gstper"/> 

WEIGHT: : <input type = "text" size="40" value = "<?php echo $row1['weight']  ?>"  name = "weight" id = "weight"/> </td>   </tr>
 

<tr>   <td> MRP : <input type = "text" autocomplete = "off" size="40"  value = "<?php echo $row1['mrp']  ?>"  onkeyup = "document.form2.sprice.value = this.value" name = "mrp" id = "mrp"/>  </td> 
  <td>Selling Price: <input type = "text" size="40" value = "<?php echo $row1['s_price']  ?>" name = "sprice" id = "sprice"/>  </td>  </tr>



<tr>   <td>Date of Packing: <input type = "text" size="30"  onchange = "isDate(this.value)"  value = "<?php echo $row1['dop']  ?>"  name = "dop"  id = "dop"/> <a href="javascript:NewCal('dop','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
<td>Expiary Date: <input type = "text" size="30"  onchange = "isDate(this.value)" value = "<?php echo $row1['expdate']  ?>" name = "expdate"  id = "expdate"/> <a href="javascript:NewCal('expdate','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>  </td>  </td>   </tr>

<tr>   <td> Batchno  : <input type = "text" size="40" autocomplete = "off" name = "batchno"  value = "<?php echo $row1['batchno']  ?>"  id = "batchno" />  </td>
<td> CATEGORY :  <select name = "sales_id"  style="width:150px"  >
	<option   value="<?php echo $vend_1;  ?>" selected="selected"><?php echo $v_cat;  ?></option>
	<?php 

	while($query1_data = mysql_fetch_array($result_sales)){
	 
	 echo"<option value = {$query1_data['0']}>{$query1_data['1']}</option>"; 

	 }
	 ?> </select> </td>   </tr> 

<tr> <td>  </td>     </tr> 

<tr> <td> Short Value </td>  <td> <input type = "text" size="40" name = "trigger" value = "<?php echo $row1['trg']  ?>"   id = "trigger"/>  </td>   </tr>
 
<tr> <td> Barcode </td>  <td> <input type = "text"  value = "<?php echo $row1['barcode']  ?>"   size="20" autocomplete = "off" name = "barcode" id = "barcode"/> <input type="button" name="btnprint" value="Get System barcode" onClick="getbarcode(1)"/>  </td>   </tr>



<tr> <td  style="text-align:center" colspan="2"  >     </br>
 <input type="button" onclick="myFunction()" value="UPDATE ITEM"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" > 
  </td>   </tr>


</table>



<h3 align = "center">  ADD INGREDIENTS  </h3>

<table width="100"  border='1' cellpadding='1' frame="box" align="center"   >

  <tr style="background-color:#0A5066; color:#F7F5F5;">
    <th COLSPAN = 5 , ALIGN = "ceneter">  


  <input type="text"   size = "25" autocomplete = "off" placeholder = "SEARCH INGREDIENTS ..."  class='auto123'  tabIndex = "3"  id="keyword" name = "keyword" >


 </th> </tr>
<tr>  <td style="text-align:center" colspan="4"  > 
<INPUT type="button" style = "color:red; font-weight:bold;height: 22px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onClick="deleteRow('dataTable')" />

  </td>  </tr>
  

  <tr>  


<td  style="text-align:center" colspan="2"  > 

<table width="100%"  id="dataTable" border='1' cellpadding='1'   >

  <tr style="background-color:#0A5066; color:#F7F5F5;">
    <th>  </th>  <th>Check</th>    <th>SNO</th>   <th>Item Name</th>   <th>QTY</th>  
	 <th>UNIT</th>     </tr>
  
 

</table>   </td> </tr>


</table>



</br>


<input  type = "text"  size = "5"   readonly  value = "0" name = "totalcnt" id = "totalcnt"  /> 

<input  type = "text"  size = "5"   readonly  value = "<?php echo $id ?>" name = "prodid" id = "prodid"  /> 




<?php
	while($row15 = mysql_fetch_array($result13))
		{	  			  
         ?> 
			  
<script language="javascript">


addRow_u('dataTable',"<?php echo  $row15['c_id'] ?>","<?php echo  $row15['c_name'] ?>","<?php echo  $row15['unit'] ?>","<?php echo  $row15['qty'] ?>");


</script>		
			  
		
			
<?php   }   ?>





</div>
</div>
</form>

<script>
window.onload=document.form2.desc.focus() ; 


</script>

</body>
</html> 