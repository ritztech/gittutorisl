<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

$id = $_GET['id'];


$result1 = mysql_query("SELECT v1.id,C1.name as debit,C2.name as credit,v1.amount as amount,v1.ptype as paytype,DATE_FORMAT(v1.tdate,'%d/%m/%Y') as pdate,
		v1.remark as remark,v1.refid as refid,v1.creditid,v1.debitid from voucher v1,customers c1,customers c2  where
c1.cid = v1.debitid
and c2.cid = v1.creditid and v1.id = $id");

$row1 = mysql_fetch_array($result1);

//echo $row1['0'];

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
              $(this).val( ui.item.label1);
			 // $( ".auto" ).val( ui.item.label );
               $( "#custid" ).val( ui.item.value);
			   $( "#cname_c" ).val( ui.item.label1);
			   //$( "#netdueamt" ).val( ui.item.desc);
			 //  $( "#cname" ).val( ui.item.desc1);
			   
			   
             //  $( "#project-description" ).html( ui.item.desc );
			   
			 //  alert(ui.item.value);
			 		 //document.form2.keyword.focus() ;
			   
			 
			   
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
		//	$( ".auto_1" ).val( ui.item.label );
               $( "#custid1" ).val( ui.item.value);
			   $( "#cname1_d" ).val( ui.item.label1);
			  // $( "#netdueamt" ).val( ui.item.desc);
			 //  $( "#cname" ).val( ui.item.desc1);
			   
			   
             //  $( "#project-description" ).html( ui.item.desc );
			   
			 //  alert(ui.item.value);
			 		// document.form2.keyword.focus() ;
			   
			 
			   
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

<link rel="stylesheet" href="date_picker/jquery-ui.css">
  
  <script src="date_picker/jquery-1.12.4.js"></script>
  <script src="date_picker/jquery-ui.js"></script>

<br><br>
<h4  align = "center"> <B style="color:#B000FF"> EDIT VOUCHER </B></h4>


<form name = "form1"  id = "form1"  method="post" action="voucher_e_b.php">

<table cellspacing="5" cellpadding="2" border="2" align="center" >

<tr> <td> Transaction Date </td>  <td> <input type = "text" size="30"  tabIndex = "1"   value = "<?php  echo $row1['pdate'] ?>"  onchange = "isDate(this.value)"  value = "<?php echo $t_date ?>" name = "expdate"  id = "expdate"/> 
 </td>   </tr> 


<tr> <td> Amount paid : </td>  <td> <input type = "text"  tabIndex = "2"  autofocus    size="30"  name = "mrp" id = "mrp"  onKeydown = "Javascript: if (event.keyCode==13) document.form1.ptype.focus();"  value = "<?php  echo $row1['amount'] ?>" />  </td>   </tr>

  <tr>
    <td>CASH/CHK:</td> <td> <select id='ptype'   tabIndex = "3"  onKeydown = "Javascript: if (event.keyCode==13) document.form1.cname.focus();" name = 'cashchk' class="abcq" style="width:230px;" >
	<option value = "<?php  echo $row1['paytype'] ?>"><?php  echo $row1['paytype'] ?></option>
	<option value = "CASH">CASH</option>
	<option  value = "CHK" >CHK</option>
	<option  value = "ONLINE" >ONLINE</option>
</select> </td>
  </tr>

  
  
<tr> <td> Money Taking From (CREDIT) </td>   <td> 

<input   name="cname"    type="text"  value = "<?php  echo $row1['credit'] ?>"  tabIndex = "4"  class='auto'  size = "30"> 
<input   name="cname_c"  id="cname_c"   type="hidden"  value = "<?php  echo $row1['credit'] ?>"   size = "30"> 
		 <input   name="custid"   id="custid"  value = "<?php  echo $row1['creditid'] ?>"  type="hidden"   size = "5">
	 
	 </td>


</tr>

<tr> <td> Money Deposited To (DEBIT) </td>   <td> 

<input   name="cname1"   type="text"  tabIndex = "5"   value = "<?php  echo $row1['debit'] ?>"  class='auto_1'  size = "30"> 
<input   name="cname1_d"  id="cname1_d"     value = "<?php  echo $row1['debit'] ?>"    type="hidden"    size = "30"> 
		 <input   name="custid1"   id="custid1"  value = "<?php  echo $row1['debitid'] ?>"  type="hidden"   size = "5">
	 
	 </td>


</tr>


  

<tr> <td> Narration : </td>  <td> <input type = "text" size="30"  tabIndex = "6"  name = "remarks"  onKeydown = "Javascript: if (event.keyCode==13) myFunction();"  value = "<?php  echo $row1['remark'] ?>"  />  
<input type = "hidden" size="40"    value = "<?php  echo $row1['refid'] ?>"  name = "refnumber" />
</td>   </tr>


<tr>   <td align="right" colspan="2" >
 <input type="button"  tabIndex = "7" onclick="myFunction()" class="abcqq" value="UPDATE DATA"   />  </td>   </tr>

 




</table>

<input type = "hidden"  size="5" name = "creditid999"    value = "<?php  echo $row1['creditid'] ?>" />
<input type = "hidden"  size="5" name = "debiid999"    value = "<?php  echo $row1['debitid'] ?>" />
<input type = "hidden"  size="5" name = "tid"    value = "<?php  echo $id ?>"  />

<input type = "hidden"  size="5" name = "old_amount"   value = "<?php  echo $row1['amount'] ?>"  />




</form>


</div>



</div>
</div>



</body>
</html> 