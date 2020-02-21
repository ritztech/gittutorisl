<?php

include ('sample1_head.php');
include("config.php");

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_items.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_valid.js"> </script>

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
	
addRow('dataTable',arfruits[0],arfruits[1],arfruits[2],arfruits[3],arfruits[4],arfruits[5],arfruits[6]);
 document.form2.keyword.value = "";
								 

var b = document.form2.totalcnt.value;
	
document.form2[ "expdate" + b ].select();

  

	
    }
  }
xmlhttp.open("GET","get_purchase_item.php?q="+str,true);
xmlhttp.send();



}

function myFunction()
{
	
	return ValidateForm();
	

	
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


		 





</script>


 


</head>

<body>

 
<form name = "form2"  id = "form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >

 <h3 align="center"> ADD NEW PURCHASE DETAILS </h3>  
	 
	<?php

    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $filename =  $parts[count($parts) - 1];
	
?>
 
	 
	 

<?php

include('config.php');



$t_date = date("d/m/Y");




?>





<table align="center"  width="60%" cellspacing="25" cellpadding="5" border="3" style="border-color:#00F;  border-collapse:collapse;">

<tr>
<td>
<table width="100%" border="0" style="text-align:center;">


<tr>
  <td>PURCHASE DATE:     <input id="demo1" type = "text"  size="15"  name = "pdate" value= <?php echo  $t_date ?>  />
    <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
	  RECIEPT/Voucher:  <input type = "text" size="15"   autofocus  tabIndex = "1" name = "pct"  id = "pct" style="width:135px;"/>
  User :    <input type = "text" readonly name = "euser"  id = "euser"  value = "<?php echo  $_SESSION['uname'] ?>" />
      </td>
</tr>

<tr>
  <td>
  
  
  
   TOTAL:  <input type = "text" size="15"   name = "ptotal"  id = "ptotal" style="width:132px;"/>
    </td>
  </tr>
  
   <tr  style="background-color:#000000;  color:#FFF;" >
<td colspan = 2 align = "center"> 
	vendor   Name : <input type = "text" name = "cst_name"  tabindex = "2"  value = ""  class='auto'  size = "30"  />
 <input   name="custid"   id="custid"  value = "1"  type="hidden"   size = "5">	  
	  Contact   <input type = "text"  id = "custcon"  tabindex = "2"   maxlength = "10" name = "custcon" />  
	 
 


	  </td> </tr>
	  
	  
	  	  
	  <tr  style="background-color:#000000;  color:#FFF;" >


 <td align = "center"> 
 
 
  <input type="text"   size = "25" autocomplete = "off" placeholder = "SEARCH ITEMS ..."  class='auto123'  tabIndex = "3"  id="keyword" name = "keyword" >
  
 
   </td> 
	 
	 


 </tr>
 
	  
	  
<tr>
  <td>
 <h4 style="text-align:left; ">PURCHASE NOTES:
    <input type = "text" name = "pnotes" value = "None" id = "pnotes" size="150" style="height:25px;"/></h4>
    </td>
  </tr>


</table>


</td>


</tr>

<tr style="background-color:#FF8000;">  <td style="text-align:center" colspan="2"  > 
<INPUT type="button" style = "color:red; font-weight:bold;height: 29px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onClick="deleteRow('dataTable')" />
<input type="button" onClick="myFunction()" value="SAVE"  style = "color:blue; font-weight:bold;height: 29px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" >
  </td>  </tr>
  
  <tr>  


<td  style="text-align:center" colspan="2"  > 

<table  width="100%"  id="dataTable"  border='1' cellpadding='1' frame="box" style="border-collapse:collapse;"   >

<tr> <th>  </th>  <th>Check</th>    <th>SNO</th>  <th> ITEM NAME </th>  <th> MRP  </th> <th> Selling Price </th>   <th> EXPIARY </th>  <th> BATCHNO </th>   <th> QTY </th>  <th> Buy Price </th> 
  <th> TOTAL </th> <th> BARCODE </th>  </tr> 

</table>





</td>  </tr>





</table>







</br>


<input class = "noPrint"  type = "text"  width="30" name = "totalcnt" id = "totalcnt"  /> 
<input  class = "noPrint"  type = "text"  width="30" name = "alltotal" id = "alltotal"  /> 




</div>






</div>
</div>
</div>
</br>



</form>




</div>
</div>
</div>




</body>
</html> 