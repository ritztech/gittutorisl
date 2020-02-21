<?php

include ('sample1_head.php');
//include ('sample1_left.php');

$t_date = date("d/m/Y");

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>
    <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
<script language="javascript">


function happycode(){

var tot = 0;
var j = document.form2.totalcnt.value;

for (var i=1; i<=j; i++)
  {
    

 var val3 = document.form2[ "netpay" + i ].value 
 tot = Number(tot) + Number(val3);
 
 document.form2.alltotal.value = tot;
  }
document.form2.totaactt.value = j;
}

</script>

<script>



   $(function() {
       		 
  		$(".auto").autocomplete({
					 
            minLength: 0,
            source: "search_items_report.php",
            
			focus: function( event, ui ) {
                      return false;
               },
        
		select: function( event, ui ) {
              $(this).val( ui.item.desc1 );
			  $( ".auto" ).val( ui.item.label );
               $( "#itemid" ).val( ui.item.value);
			 
			   //  document.form2.additembtn.focus();
			   
			 
			   
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

 
<form name = "form1"  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>
 <h3 align="center">  SELECT DATE RANGE </h3> 
	  
	 
<table align="center">
<tr>
<td> START DATE </td>

<td> <input id="dstart"  name = "dstart" tabindex="1"  type = "text"  size="15"  value="<?php  echo $t_date ?>" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
	 
<td> END DATE </td>

<td> <input id="dend"  name = "dend"   type = "text"  size="15"  value="<?php  echo $t_date ?>"  />  <a href="javascript:NewCal('dend','ddmmyyyy')">
<img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> 

	Search Item: <input type = "text" name = "cst_name"   tabindex = "1"  autofocus   value = ""  class='auto'  size = "20"  />
 <input   name="itemid"   id="itemid"  value = "0"  type="hidden"   size = "5">	  

</td>


	
	 
<td> <input type="submit" name="submit" value="SHOW RECORDS" tabindex = "2">  </td>

</tr>



</table>
</div>

</form>

<?php

include('config.php');

if(isset($_GET['submit']))
{

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];
$item_id=$_GET['itemid'];


if($item_id==0)
{
	$result13 = mysql_query("select si.sell_date,st.itemname ,st.weight,st.itemid,sum(st.qty) FROM sell_items st,sell_invoice 
 si where si.billno = st.billno and si.sell_date between 
STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')
group by st.itemid");

	
}
else
{
	$result13 = mysql_query("select si.sell_date,st.itemname ,st.weight,st.itemid,sum(st.qty) FROM sell_items st,sell_invoice 
 si where si.billno = st.billno and itemid='$item_id'  and si.sell_date between 
STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')
group by st.itemid");

	
}


/*
echo "select si.sell_date,st.itemname ,st.weight,st.itemid,sum(st.qty) FROM sell_items st,sell_invoice 
 si where si.billno = st.billno and itemid='$item_id'  and si.sell_date between 
STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')
group by st.itemid";
*/

?>




<form name = "form2" >
</br>

<div  align = "center">
<input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
</div>
</br>

<div id = "griddiv">

<table border='1' cellpadding='1' frame="box"   width = "100%" bgcolor="white" align="center">

<tr> <th style="text-align:center" colspan="15"  >
 <font color="blue"> <h4>	ITEM SALE REPORT BETWEEN <?php echo  $st_1 ?>  AND <?php echo  $end_1 ?>   </h4> </font> </th>  </tr>
<tr style="background-color:#0A5066; color:#F7F5F5;"> 

<th>Sno </th> <th> DATE </th>  <th> ITEM NAME </th> <th> WEIGHT </th>   <th> QTY </th> </tr> 



<?php
  $cas_Sale = 0;
$card_Sale = 0;

$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
  
 <tr>
   <td>  <?php  echo $i ?>  </td>
   <td>  
   
   <?php echo date("d-m-y", strtotime($row13['0']));  ?>   </td>
    <td> 
	 <a href="Report_buy_sell_datewise_n.php?id= <?php echo  $row13['3']?>,,,<?php echo date("d/m/Y", strtotime($row13['0'])); ?>">
   
   <?php echo  $row13['1'] ?></a>
	
</td>
   <td><?php echo  $row13['2'] ?> </td>
   <td><?php echo  $row13['4'] ?> </td>
    
</tr>
  
<?php  




}	?>



</table>

</div>


</br>

  



</div>






</div>
</div>
</div>
<script>
//window.onload=happycode ; 

 document.form1.dstart.value = "<?php echo $st_1  ?>" ;
  document.form1.dend.value = "<?php echo $end_1  ?>" ;
  
 document.form2.btnprint.focus();
  

</script>

</form>

<?php } ?>


</div>
</div>
</div>


</body>
</html> 