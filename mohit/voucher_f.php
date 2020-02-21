<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");
$t_date = date("d/m/Y");
?>

<html>

<head>
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

  <script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
 

   <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
 
    <script>
         $(function() {
			 
       		 
  		$(".auto").autocomplete({
			
            minLength: 0,
            source: "search_voucher.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.label1 );
			 //$( ".auto" ).val( ui.item.label );
			   $( "#custid" ).val( ui.item.value);
			   $( "#cname_c" ).val( ui.item.label1);
			   
			   
			   //$( "#netdueamt" ).val( ui.item.desc);
			 //  $( "#cname" ).val( ui.item.desc1);
			   
			   
             //  $( "#project-description" ).html( ui.item.desc );
			   
			 //  alert(ui.item.value);
			 		document.form1.cname1.focus() ;
			   
			 
			   
               return false;
            }
         }
		 
)

  		$(".auto_1").autocomplete({
					 
            minLength: 0,
            source: "search_voucher.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.label1 );
			//  $( ".auto_1" ).val( ui.item.label );
               $( "#custid1" ).val( ui.item.value);
			    $( "#cname1_d" ).val( ui.item.label1);
			  // $( "#netdueamt" ).val( ui.item.desc);
			 //  $( "#cname" ).val( ui.item.desc1);
			   
			   
             //  $( "#project-description" ).html( ui.item.desc );
			   
			 //  alert(ui.item.value);
			 		// document.form2.keyword.focus() ;
					
				document.form1.remarks.focus() ;
					
			   
			 
			   
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
	  
	  
	  	   <script>

//use strict;

document.addEventListener('keydown', (event) => {
  const keyName = event.key;

  if(keyName == "F1")
  {
	 // window.open('bill_add_front.php')
	 
	// alert('f1');
	var sdate444 = prompt("Please enter date as DD/MM");
	
	
			var date = new Date();

    // currentDate = date.getDate();     // Get current date
     // month       = date.getMonth() + 1; // current month
      year        = date.getFullYear();
	  
	  
	 document.form1.expdate.value = sdate444+"/"+year;
 
	 
	  
  }
  

}, false);

</script>



	<script>
  $( function() {
    $( "#expdate" ).datepicker();
	
  } );
  
  
  function myFunction()
{
	
	
var p_val = document.form1.expdate.value;

if(p_val == "")
{
	alert('Please fill date ..');
	document.form1.expdate.focus();
	
	return false;
	
}

	   var dt=document.form1.remarks;
	
	    if (dt.value == "" )  {
			alert( "Please fill Narration ...!" );
	           dt.focus()
              return false
    }
	
	

	   var dt=document.form1.mrp;
	
	    if (dt.value == "0"  || dt.value == "" )  {
			alert( "Please fill Amount ...!" );
	           dt.focus()
              return false
    }
	
		   var dt=document.form1.custid;
		   var dt1=document.form1.cname;
	
	    if (dt.value == "0"  || dt1.value == "" )  {
			alert( "Please choose CREDIT account ...!" );
	           dt1.focus()
              return false
    }
	
			   var dt=document.form1.custid1;
		   var dt1=document.form1.cname1;
	
	    if (dt.value == "0"  || dt1.value == "" )  {
			alert( "Please choose DEBIT account ...!" );
	           dt1.focus()
              return false
    }
	
		   var dt=document.form1.custid1;
		   var dt1=document.form1.custid;
	
	    if (dt.value == dt1.value )  {
			alert( "Debit and credit account should be different ...!" );
	           dt1.focus()
              return false
    }
	
			   var dt=document.form1.cname1;
		   var dt1=document.form1.cname1_d;
	
	    if (dt.value != dt1.value )  {
			alert( "PLESE SELECT ACCOUNT FROM LIST ONLY AND DON'T UPDATE NAME , USE MASTE LIST TO UPDATE ANY NAME .....!" );
	           dt.focus()
              return false
    }
	
				   var dt=document.form1.cname;
		   var dt1=document.form1.cname_c;
	
	    if (dt.value != dt1.value )  {
			alert( "PLESE SELECT ACCOUNT FROM LIST ONLY AND DON'T UPDATE NAME , USE MASTE LIST TO UPDATE ANY NAME .....!" );
	           dt.focus()
              return false
    }
	
	
	
		   	
	


//alert("Ready submit ...");
document.getElementById("form1").submit();



}
  </script>  

</head>

<body>



<?php


$t_date = date("d/m/Y");

$query_color="SELECT `cid`,upper(name) AS `desc` FROM `customers`  ";
$result_color=mysql_query($query_color);


$query_color1="SELECT `cid`,upper(name) AS `desc` FROM `customers`  ";
$result_color1=mysql_query($query_color1);

  



?>


</br>
</br>
<link rel="stylesheet" href="date_picker/jquery-ui.css">
  
  <script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script>



<h3  align = "center"> <B style="color:#B000FF"> VOUCHER ENTRY </B></h3>

<form name = "form1"  id = "form1"  method="post" action="voucher_b.php">

<table  cellspacing="5" cellpadding="2" border="2" align="center" >
<tr> <td colspan="2" align="right"> 	<a  href="all_voucher.php" target="_blank" >
 <input type="button"  tabIndex = "8" class="abcqq"  value="VIEW VOUCHER RECORD"   /> 
</a>  </td>   </tr> 

<tr> <td> Transaction Date </td>  <td> <input type = "text" size="30"  tabIndex = "1" value = "<?php echo $t_date; ?>" name = "expdate"  id = "expdate"/> </td>   </tr> 


<tr> <td> Amount paid : </td>  <td> <input type = "text"  tabIndex = "2"  autofocus  autocomplete = "off" size="30" onKeydown = "Javascript: if (event.keyCode==13) document.form1.ptype.focus();" value = "" name = "mrp" id = "mrp"/>  </td>   </tr>

  <tr>
    <td>CASH/CHK:</td>  <td><select id='ptype'   tabIndex = "3" name = 'ptype'  onKeydown = "Javascript: if (event.keyCode==13) document.form1.cname.focus();"  CLASS="abcq" style="width:220px" >
	<option value = "CASH">CASH</option>
	<option  value = "CHK" >CHK</option>
	<option  value = "CHK" >ONLINE</option>
</select> </td>
  </tr>

  
  
<tr> <td> Money Taking From (CREDIT) </td>   <td> 

<input   name="cname"   type="text"  tabIndex = "4"  class='auto'  size = "30">  
<input   name="cname_c"  id="cname_c"   type="hidden"    size = "30"> 
		 <input   name="custid"   id="custid"  value = "0"  type="hidden"   size = "5">
	 
	 </td>


</tr>

<tr> <td> Money Deposited To (DEBIT) </td>   <td> 

<input   name="cname1"    type="text"  tabIndex = "5"  class='auto_1'  size = "30">
<input   name="cname1_d"  id="cname1_d"      type="hidden"    size = "30"> 
		 <input   name="custid1"   id="custid1"  value = "0"  type="hidden"   size = "5">
	 
	 </td>


</tr>


  

<tr> <td> Narration : </td>  <td> <input type = "text" value = "" size="30" autocomplete = "off"  onKeydown = "Javascript: if (event.keyCode==13) myFunction();"  tabIndex = "6"  name = "remarks"  /> 
<input type = "hidden" size="40"  value = "" name = "refnumber" />
 </td>   </tr>


<tr>   <td ALIGN="RIGHT" colspan="2" >
 <input type="button"  tabIndex = "7" class="abcqq"  onclick="myFunction()" value="SAVE RECORD"   />  </td>   </tr>

 




</table>



</form>


</div>



</div>
</div>



</body>
</html> 