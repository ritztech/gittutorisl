<?php

include ('sample1_head.php');

include("config.php");

$query_dispMake="SELECT `id`,upper(CONCAT(`desc`,'--MRP--', `mrp`)) AS `desc` FROM `m_master_store`order by 2";
$result_dispMake=mysql_query($query_dispMake);
    
$entryd = $_GET['entryd'];

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_items_barcode.js"> </script>


     <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
	  

<script language="javascript">


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
            source: "search_mrp.php",
            
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
	
//alert(arfruits[2]);
	
	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[4],arfruits[5],str);


 
  document.form2.keyword.value = "";
  document.form2.keyword.focus();
  
  

	
    }
  }
xmlhttp.open("GET","get_purchase_item_bcode.php?q="+str,true);
xmlhttp.send();



}


function myFunction()
{
	
	
	
	
var tcnt = document.form2.totalcnt.value;


	if( tcnt == "0" )
   {
     alert( "Please add items .. !" );
     document.form2.keyword.focus() ;
     return false;
   }
   
   

for (var init=1; init<=tcnt; init++)
  {
	  	  
	  var dt=document.form2[ "dop" + init ]
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }

	
		if( document.form2[ "barcode" + init ].value == "" )
   {
     alert( "Please update  barcode  from invendory  ...!" );
     document.form2[ "barcode" + init ].focus() ;
     return false;
   }
   
   
   		if( document.form2[ "itemsprice" + init ].value == "" )
   {
     alert( "Please add product price  ...!" );
     document.form2[ "itemsprice" + init ].focus() ;
     return false;
   }
   
   
      		if( document.form2[ "noofitem" + init ].value == "" )
   {
     alert( "Please numbre of barcode .....!" );
     document.form2[ "noofitem" + init ].focus() ;
     return false;
   }
   
   
   
   
   
   
   
  }
	
	
	
	
	
document.getElementById("form2").submit();
	
}





</script>




</head>

<body>

<form id = "form2" name = "form2" method="post" action="purchase_report_barcode_edit.php"  onSubmit="return ValidateForm()" >
<br>
<h3 align="center"> ADD ITEMS TO PRINT BARCODE </h3> 
	 
<?php

    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $filename =  $parts[count($parts) - 1];
	
?>
 
	</br>
	
	 
<table border="2" align="center"   >

<tr>

<td>   

              <input type="text"   size = "25" autocomplete = "off" placeholder = "SEARCH ITEMS ..."  class='auto123'  autofocus   id="keyword" name = "keyword" >
				

</td>
	 
</tr>




</table>
</br>


	   
	 
	 
	 
	
	
	 
 
 
</div>







<?php

include('config.php');



$t_date = date("d/m/Y");



$result1 = mysql_query("SELECT max( `purchase_id` ) purchase_id  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);

$query_dispMake1="SELECT `id`,`name` FROM `m_vendor` ";
$result_dispMake1=mysql_query($query_dispMake1);



?>





<table  width="100%" cellspacing="25" cellpadding="5" border="3" align="center"  >


<tr>  <td style="text-align:center" colspan="2"  > 
<INPUT type="button" style = "color:red; font-weight:bold;height: 22px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onclick="deleteRow('dataTable')" />
<input type="button" onclick="myFunction()" value="SAVE"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" >
  </td>  </tr>
  
  <tr>  


<td  style="text-align:center" colspan="2"  > 

<table  width="100%"  id="dataTable"  border='1' cellpadding='1' frame="box"   >

<tr> <th>  </th>  <th>Check</th>    <th>SNO</th>  <th> ITEM NAME </th>  <th> WEIGHT </th>  <th> BARCODE </th>  <th> MRP </th>   <th> PRICE </th>  <th> DOP </th>  <th> QTY </th> </tr> 

</table>





</td>  </tr>





</table>


<input class = "noPrint"   type = "text"  width="30"  value = "0" name = "totalcnt" id = "totalcnt"  /> 
<input  class = "noPrint"  type = "text"  width="30" name = "alltotal" id = "alltotal"  /> 
<input  class = "noPrint"   type = "text"  width="30" name = "printid" id = "printid"   value = "<?php echo $entryd; ?>" /> 




</br>

	<?php
	
	$sql1 = mysql_query("SELECT `item_id`,qty FROM `barcode_print_record` WHERE  record_id = $entryd"); 
	
	
	$m = 1;
	while($row = mysql_fetch_array($sql1))
		{$m = $m+1;
	
	$itemid = $row['0'];
	$qty_req = $row['1'];
	
	$result12 = mysql_query("SELECT `desc`, `mrp`, `barcode`,DATE_FORMAT(dop,'%d/%m/%Y') as dop ,weight,s_price FROM `m_master_store`  WHERE id = $itemid");

$row12 = mysql_fetch_array($result12);

$v1= $row12['desc'];
$v2= $row12['mrp'];
$v3= $row12['barcode'];
$v4= $row12['dop'];
$v5= $row12['weight'];
$v6= $row12['s_price'];

						  
         	  ?> 
			  


<script>

addRow_upd('dataTable',"<?php echo $v1 ?>","<?php echo $v2 ?>","<?php echo  $v3 ?>","<?php echo  $v4 ?>","<?php echo  $v5 ?>","<?php echo  $v6 ?>","<?php echo  $itemid ?>","<?php echo  $qty_req ?>");


</script>		
			  
		
			
			<?php   }	?>
			







</form>



</body>
</html> 