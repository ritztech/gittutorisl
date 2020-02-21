<?php

include ('sample1_head.php');
//include ('sample1_left.php');

//session_start();
//$n_id =  $_SESSION['uname'];


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
	
function deleterecord_rec(deleteId,scr_name,rowtodelete) {
	
	//alert(1);
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL=scr_name+".php?id="+deleteId;
			
			// alert(strURL);
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	//window.location='invoice_view.php';
//	location.reload(); 
	
	  var row = rowtodelete.parentNode.parentNode;
      row.parentNode.removeChild(row);
	  
	
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

$id = $_GET['id'];

$result1 = mysql_query("SELECT `name`, `contact`, `cid`   from  customers where cid  = $id");
$row1 = mysql_fetch_array($result1);



  
  
$sql1 = mysql_query("SELECT `sell_date`, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, `salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno` FROM `sell_invoice` WHERE `balance` > 0 and `cust_id` =  $id");

$sql_23 = mysql_query("SELECT v1.creditid,c1.name as debiname,v1.tdate as trdate,0,v1.amount as amountss,v1.id as vidd,v1.remark  as remarkss,'voucher_e_f','delete_voucher' FROM voucher v1,customers c1,customers c2 where v1.debitid = c1.cid and v1.creditid = c2.cid and v1.creditid = $id");  




?>




<form name = "form2" >


<h3 align="center"> BILL DUE REPORT FOR  <?php echo $row1['0'] ?></h3>


<div  align = "center">
<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/>
<input type="button" name="btnprint" value="CLOSE" onClick="closeMe()"/>

<INPUT class="btn" Type="BUTTON" VALUE="Clear Dues" ONCLICK="window.location.href='voucher_f.php'">
</div>
</br>


<div id = "griddiv">

<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center" width="100%"  >
<tr style="background-color:#0A5066; color:#F7F5F5;"> 


<th>SNO</th>  <th> DATE </th>    <th> Bill No</th>   <th> NET AMOUNT</th>     <th>PAID  </th>   <th> Balance</th>  
   </tr> 


<?php
 
 
 
$i = 0;
$jk = 0;
$net_buy = 0;
$net_paid = 0;
		while($row = mysql_fetch_array($sql1))
		{$i = $i+1;
	
						 
				 
			  
         	  ?>
			  
			  
			  
		  
		     <tr>
		  
			  <td>  <?php echo $i   ?> </td>
			  <td>  <?php echo date("d/M/Y", strtotime($row['sell_date']));  ?> </td>
			 <td><font color="#663300"><a href="show_rec_bill.php?id= <?php echo  $row['billno']?> "> <?php echo  $row['billno']?>  </a></font></td>					
				  			 
			   <td>  <?php echo $row['netpay']   ?> </td>
			   <td>  <?php echo $row['paid'];   ?> </td>
			    <td>  <?php echo $row['balance'];   ?> </td>
			   
			 		    
			 
			  
			</tr>
			
			<?php 
			
			 $jk = $jk + $row['balance'] ;
			 $net_buy = $net_buy + $row['netpay'];
			 $net_paid = $net_paid + $row['paid'];
			 

		  }	
		  
	$all_but_amt=$net_buy;	     
  
  
  ?>

  <tr>  <td> </td>  <td> </td>  <td align = "right">Total : -  </td>
<td> <?php  echo $net_buy  ?></td>  <td> <?php  echo $net_paid  ?>  </td>  <td> <?php  echo $jk  ?> </td>   </tr>
</table>


</br>
</br>


<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center" width="100%"  >
<tr> <td> Payment vouchers </td> </tr>
<tr style="background-color:#0A5066; color:#F7F5F5;"> 


<th>SNO</th>  <th> DATE </th>    <th> Debit Account</th> <th>Remarks  </th>    <th> AMOUNT</th>      
   </tr> 


<?php
 $i = 0;
$jk = 0;
$net_buy = 0;
$net_paid = 0;
		while($row = mysql_fetch_array($sql_23))
		{$i = $i+1;
         	  ?>
			  
		     <tr>
		  
			  <td>  <?php echo $i   ?> </td>
						 <td><font color="#663300"><a href="voucher_e_f.php?id= <?php echo  $row['vidd']?> "> <?php echo date("d/M/Y", strtotime($row['trdate']));  ?>  </a></font></td>					
				  			 
			   <td>  <?php echo $row['debiname']   ?> </td>
			   <td>  <?php echo $row['remarkss'];   ?> </td>
			    <td>  <?php echo $row['amountss'];   ?> </td>
			   
			 		    
			 
			  
			</tr>
			
			<?php 
			
			
			 $net_paid = $net_paid + $row['amountss'];
			 

		  }	
		  
		     
  
  
  ?>

  <tr>  <td> </td>  <td> </td>  <td align = "right"></td>
 <td align = "right">Total Received :   </td>  <td> <?php  echo $net_paid  ?>  </td>  <td>  </td>   </tr>
 
   <tr>  <td> </td>  <td> </td>  <td align = "right"></td>
 <td align = "right">Net Due :   </td>  <td> <?php  echo $all_but_amt-$net_paid  ?>  </td>  <td>  </td>   </tr>
</table>


</div>


</div>






</div>
</div>
</div>

</form>



</div>
</div>
</div>


</body>
</html> 