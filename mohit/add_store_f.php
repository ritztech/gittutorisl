<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");


$query_dispMake="SELECT `itemid`,upper(itemname) AS `desc` FROM `m_item_store` order by 2 ";
$result_color=mysql_query($query_dispMake);




?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/purchase_items_s.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/tabenter.js">  </script>


     <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
	  





<script language="javascript">


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
								 

var b = document.form2.totalcnt.value;
	
document.form2[ "qty" + b ].select();

	
    }
  }
xmlhttp.open("GET","get_purchase_item_s.php?q="+str,true);
xmlhttp.send();



}


 
function myFunction()
{
	var k = document.form2.totalcnt.value;

	if( document.form2.totalcnt.value == "" )
   {
     alert( "Please add items .. !" );
     document.form2.keyword.focus() ;
     return false;
   }
   
   var vid_1 = document.form2.cst_name.value;
   
	if( vid_1 == "" )
   {
     alert( "Please select vendor !" );
     document.form2.cst_name.focus() ;
     return false;
   }

   
   	var dt=document.form2.pct;
		    if (dt.value == ""){
			alert( "Please fill voucher number ..." );
	           dt.focus()
              return false
                          }
						  
   
   
   

   

for (var i=1; i<=k; i++)
{
	
	var dt=document.form2[ "itemname" + i ]
		    if (dt.value == ""){
			alert( "Please fill item name  ..." );
	           dt.focus()
              return false
                          }
						  
	
			var dt=document.form2[ "qty" + i ]
		    if (dt.value == ""){
			alert( "Please fill quantity ..." );
	           dt.focus()
              return false
                          }
						  
var dt=document.form2[ "price" + i ]
		    if (dt.value == ""){
			alert( "Please fill amount ..." );
	           dt.focus()
              return false
                          }
						  
							   
	
	
}
	
	
	document.getElementById("form2").submit();
	
	
	
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
	 		
			     document.form2.additembtn.focus();
			   
			 
			   
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

<body><br>
<table align="center">
</tr>
<td>
 <fieldset>
 <legend>ADD STORE PURCHASE</legend> 
 
<form name = "form2"  id = "form2" method="post" action="store_purchase_b.php"  >

<?php

include('config.php');



$t_date = date("d/m/Y");









?>
</br>


<table  width="100%"  border="2" align="center" style="background-color:#ebf0fa; color:#000000; font-weight:bold;">

<tr>
<td  align = "center"> Voucher No: <input type = "text" size="15"  style="border:double;"  value = "V111"   name = "pct"  id = "pct"/>
Date: <input id="demo1" type = "text"  size="10"  name = "pdate" value= <?php echo  $t_date ?> id = "pdate" />  <a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>  

Total:   <input type = "text" size="25" style="border:double;"   name = "ptotal"  id = "ptotal"/>
 


 </td> 
	 
</tr>



 
 <tr>
<td colspan = 2 align = "center"> 
	Vendor   Name : <input type = "text" name = "cst_name" style="border:double;"  tabindex = "1"  autofocus   value = ""  class='auto'  size = "30"  />
 <input   name="custid"   id="custid"  value = "1"  type="hidden"   size = "5">	  
	  Contact   <input type = "text"  id = "custcon"  tabindex = "1"  style="border:double;"  maxlength = "10" name = "custcon" />  
	 
 <input type="button"  name = "additembtn"   id= "additembtn"   tabindex = "1"   onKeydown = "Javascript: if (event.keyCode==13) addRow('dataTable');"  style="font-weight:bold; color:black;"  value="ADD ITEM"   /> 
 


	  </td> </tr>
	  
	  
	 
 
	  
	  
	  <tr> <td  align = "center">    
  
   Notes: <input type = "text" name = "pnotes" value = "None" id = "pnotes"/>  
 User:  <input type = "text" readonly name = "euser"  id = "euser"  value = "<?php echo  $_SESSION['uname'] ?>" />    </td>   </tr>
	  



</table>

</br>


<table width="100%"  border='1' cellpadding='1' frame="box" align="center"   >

  <tr  style="background-color:#000000;  color:#FFF;">
    <th COLSPAN = 5 , ALIGN = "ceneter">    ITEM LIST </th> </tr>
<tr>  <td style="text-align:center" colspan="4"  > 
<input type="button"  tabIndex = "2"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()" value="SAVE"   /> 
<INPUT type="button" style = "color:red; font-weight:bold;height: 22px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="Delete Row" onClick="deleteRow('dataTable')" />

  </td>  </tr>
  

  <tr>  


<td  style="text-align:center" colspan="2"  > 

<table width="100%"  id="dataTable" border='1' cellpadding='1'   >

  <tr  style="background-color:#000000;  color:#FFF;" >
   <th>  </th>  <th>Check</th>    <th>SNO</th>   <th>ITEM NAME</th> <th>UNIT</th>   <th>QTY</th>   <th>Buy price</th>  <th>Total</th>      </tr>
  
 

</table>   </td> </tr>


</table>



</br>


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt"  /> 
<input  type = "hidden"  size = "5" name = "alltotal" id = "alltotal"  /> 

<input  type = "hidden"  name = "vendname" id = "vendname"  /> 




</div>



</form>





</div>
</div>

<script>
window.onload=document.form2.foodmname.focus();
</script>
</fieldset>
 </td>
</tr>
</table>
</body>
</html> 