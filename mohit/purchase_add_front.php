<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

$query_sales="SELECT `id`,upper(CONCAT(`name`)) AS `name` FROM p_category";
$result_sales=mysql_query($query_sales);

$query_company="SELECT `comp_id`, `comp_desc` FROM `p_company`   order by 2 ";
$result_company=mysql_query($query_company);

$query_cust1="SELECT `cid`,upper(CONCAT(`name`)) AS `name` FROM customers   where acctype = 3 ";
$result_cust1=mysql_query($query_cust1);


?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_items.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_valid.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/tabenter.js">  </script>

       <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
 
    <script>
	
document.addEventListener('keydown', (event) => {
  const keyName = event.key;
  
 // alert(keyName);

  if(keyName == "F1")
  {
	 	 myFunction();
		  
		  
	  
  }

  }, false);
  




         $(function() {
       		 
 		$(".auto").autocomplete({
					 
            minLength: 2,
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
			 		 document.form2.desc.focus() ;
			   
			 
			   
               return false;
            }
         }
		 
)

  		$(".auto123").autocomplete({
			
			 minLength: 2,
            source: "search_mrp.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
			
			 
			
              $(this).val( ui.item.desc1 );
	         $( "#comid_77" ).val( ui.item.value);
		
				//fgetdetails();
				
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



      </script>
	  


<script language="javascript">


function chk_66767 ()
{
var v_78 = document.form2.comid_77.value;
if(v_78 > 0)
{
	fgetdetails();
}
}




function h123(str)
{
	//alert(str);

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
	
//alert(arfruits[5]);


	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[4],arfruits[5],arfruits[6],arfruits[7],arfruits[8],arfruits[9],arfruits[10],arfruits[11]);

 document.form2.desc.value = "";
								 

var b = document.form2.totalcnt.value;
	
document.form2[ "mrp" + b ].select();

  

	
    }
  }
xmlhttp.open("GET","get_purchase_item.php?q="+str,true);
xmlhttp.send();



}



 function get_cat_id(thelist) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;

 document.form2.catname.value = content;
  
  
		
}




function fgetdetails(){



if( document.form2.desc.value == "" )
   {
     alert( "Please enter product name !" );
     document.form2.desc.focus() ;
     return false;
   }
   

   if( document.form2.p_category.value == "" )
   {
     alert( "Please select a category!" );
     document.form2.p_category.focus() ;
     return false;
   }
   
     
   var item_name = document.form2.desc.value;
   var item_name1 = item_name.toUpperCase();
   var item_cat = document.form2.p_category.value;
		 
		 
		 //alert(item_cat);
		 
		 
	var prod_id_p = document.form2.comid_77.value;
		var catname_n = document.form2.catname.value;
	
	
	
//`desc`, `s_price`, `trg`, `mrp`,`barcode` , DATE_FORMAT(expdate,'%d/%m/%Y') as expdate , `batchno`,`id`, `grp_id`, `catid`

addRow('dataTable',item_name1,'','50','','','','','0','',item_cat,catname_n,'');
		 
//addRow_1('dataTable',item_name1,item_comp,item_cat,prod_id_p);


var b = document.form2.totalcnt.value;
	
document.form2[ "mastdesc" + b ].focus();
		 

return true 
 }

 
 function func_change ()
 
 {
	document.form2.comid_77.value = "0";
	 
 }

     
function myFunction()
{
	
	return ValidateForm();
	

	
}
 

</script>




</head>

<body>
 
<form name = "form2"   id="form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >



<?php

include('config.php');



$t_date = date("d/m/Y");



$result1 = mysql_query("SELECT max( `purchase_id` ) purchase_id  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);



$query_dispMake1="SELECT `id`,upper(CONCAT(`name`,'**', `contact`,'**', `address`)) AS `name`  FROM `m_vendor` ";
$result_dispMake1=mysql_query($query_dispMake1);



$result_b = mysql_query("SELECT max( `bar_value` ) bar_value  FROM `barcode_gen`");
$row1_b = mysql_fetch_array($result_b);



?>
<br>


<input type = "text" size="15"   name = "barvalue" value= <?php echo  $row1_b['0']?> id = "barvalue"/> 
<div align = "center">ADD NEW PURCHASE DETAILS  </div>
<table width="100%"  border='1' cellpadding='1' frame="box">

<tr style="background-color:#000000;  color:#FFF;" >
  <td  align = "center">PURCHASE DATE:     <input id="demo1" type = "text"  size="15"  name = "pdate" value= <?php echo  $t_date ?>  />
    <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
	  RECIEPT/Voucher:  <input type = "text" size="15"     value = "AAAA" name = "pct"  id = "pct" style="width:135px;"/>
  User :    <input type = "text" readonly name = "euser"  id = "euser"  value = "<?php echo  $_SESSION['uname'] ?>" />
      </td>
</tr>

<tr style="background-color:#000000;  color:#FFF;" >
  <td align = "center" >
  
  
  
   TOTAL:  <input type = "text" size="15"   name = "ptotal"  id = "ptotal" style="width:132px;"/>
  Purchase Notes :  <input type = "text" name = "pnotes" value = "None" id = "pnotes" size="50" />
    </td>
  </tr>
  
     <tr  style="background-color:#FDFBFB;  " >
<td colspan = 2 align = "center"> 
	VENDOR   NAME : <input type = "text" name = "cst_name"  tabindex = "1"  autofocus   value = ""  class='auto'  size = "30"  />
 <input   name="custid"   id="custid"  value = "1"  type="hidden"   size = "5">	  
	  CONTACT   <input type = "text"  id = "custcon"  tabindex = "1"   maxlength = "10" name = "custcon" />  
	 
 


	  </td> </tr>
	  

<tr>
  <td ><table   border="0" align="center" width="100%" style="background-color:#B86B09; color:#FFFFFF;">
<tr>  <td align = "center"> PRODUCT NAME   </td>  <td  align = "left"> CATEGORY   </td>    </tr>
<tr> 

<td align = "center"> 
	 
	 

	 
<input type = "text" size="40"  tabindex = "2"  class='auto123'  value = ""  onkeyup = "func_change()"    name = "desc" id = "desc"/>
<input type = "hidden"   size = "5"  value = "0" name = "comid_77" id = "comid_77"/>
 
	 </td> 
	 
	 


 <td  align = "left">   <select name = "p_category"  tabindex = "3"  onchange = "get_cat_id(this)" autofocus  onkeydown="ModifyEnterKeyPressAsTab(event);"    style="width:200px" >
      <option   value="" selected="selected"> </option>
      <?php 

	while($query_data = mysql_fetch_array($result_sales)){
	 
	 echo"<option  value = '{$query_data['0']}'>{$query_data['1']}  </option>"; 

	 }
	 ?> </select>   
<input type="button" name = "mybtn445454"  tabIndex = "4"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="fgetdetails()" value="ADD NEW "   />	 </td>   

	 </tr>







</table>&nbsp;</td>
  </tr>
  

<td  style="text-align:center" colspan="4"  > 

<INPUT type="button" style = "color:red; font-weight:bold;height: 22px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onClick="deleteRow('dataTable')" />


<table  id="dataTable"  border='1' cellpadding='1' frame="box" width="100%"   >


<tr> <th>  </th>  <th>Check</th>    <th>SNO</th>  <th> CATEGORY</th><th> ITEM NAME </th>  <th> WEIGHT </th>  <th> MRP  </th> <th> PRICE </th>   <th> EXPIARY </th> 

 <th> TRG </th>  <th> BATCHNO </th>   <th> BARCODE </th>    <th> QTY </th>  <th> Buy Price </th> 
  <th> TOTAL </th> <th>  </th>  <th>  </th>  <th>  </th>  </tr> 
  
</table>





</td>  </tr>


</table>



</br>


<input  type = "hidden"  size = "5" value = "0" name = "totalcnt" id = "totalcnt"  /> 
<input  type = "hidden"  size = "5" value = "0" name = "catname" id = "catname"  /> 
<input    type = "hidden" size = "5"  name = "alltotal" id = "alltotal"  /> 



</div>



</form>





</div>
</div>

<script>
//window.onload=document.form2.desc.focus();
</script>

</body>
</html> 