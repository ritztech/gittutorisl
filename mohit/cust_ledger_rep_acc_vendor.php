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
	
	
	


</script>



</head>

<body>

<?php

include('config.php');

$id = $_GET['id'];

$ocrebit = "0";
$odebit = "0";


$result12 = mysql_query("SELECT `cid`, name as acc_name, `contact`, city as company, `address`, op_dues as op_bal, drcr as dr_cr, DATE_FORMAT(o_date,'%d/%m/%Y') as op_date FROM `customers`
 where cid = $id");
$row12 = mysql_fetch_array($result12);



$cname= $row12['acc_name'];
$opdues= $row12['op_bal'];
$odates= $row12['op_date'];

$drcr= $row12['dr_cr'];


//echo $drcr;

if($drcr == "CR")
{
	$ocrebit = $opdues;
}

else
{
	$odebit = $opdues;
	
}





$sql="delete from ledger_rep_a";

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  /*

  	$sql="INSERT INTO `ledger_rep_a`(`cust_id`, `l_type`, `o_date`, debit, credit,refid,detail) 
              value ($id,'OPENING ACC',STR_TO_DATE('$odates','%d/%m/%Y'),'$odebit','$ocrebit','0','OPENING ACC')";
			//echo $sql;  
		
		
		
	<td>  <input type='button' name='btnprint' value='DEL' class="" onclick='deleterecord_rec("<?php echo $row['refid']?>","<?php echo $row['del_scr']?>",this)'/>  </td>
			  

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
	
  
*/
$sql="INSERT INTO `ledger_rep_a`(`cust_id`, `l_type`, `o_date`, debit, credit,refid,detail,scr_name,del_scr) 
SELECT v1.debitid,c2.name, v1.tdate, v1.amount,0,v1.id,v1.remark ,'voucher_e_f','delete_voucher'  FROM voucher v1,customers c1,customers c2 
where v1.debitid = c1.cid and v1.creditid = c2.cid and v1.debitid = $id";





if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }

$sql="INSERT INTO `ledger_rep_a`(`cust_id`, `l_type`, `o_date`, debit, credit,refid,detail,scr_name,del_scr) 
SELECT v1.creditid,c1.name,v1.tdate,0,v1.amount,v1.id,v1.remark ,'voucher_e_f','delete_voucher' FROM
 voucher v1,customers c1,customers c2 where v1.debitid = c1.cid and v1.creditid = c2.cid and v1.creditid= $id";  


  

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }  
  ///=============================
  
  $sql="INSERT INTO `ledger_rep_a`(`cust_id`, `l_type`, `o_date`, debit, credit,refid,detail,scr_name,del_scr)
SELECT vendor_id,'PURCHASE',p_date,'0',total,purchaseid,'PURCHASE','Report_purchase_show_rec','delete_purchase_rec' FROM `stock_p_invoice` WHERE vendor_id=$id";





if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
$sql1 = mysql_query("SELECT * FROM `ledger_rep_a`  order by   o_date   ");  


?>




<form name = "form2" >


<h3 align="center"> LEDGER  REPORT</h3>


<div  align = "center">
<input type="button" name="btnprint" value="Print" onClick="PrintMe('griddiv')"/>
</div>
</br>


<div id = "griddiv">

<table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center" width="100%"  >
<tr style="background-color:#0A5066; color:#F7F5F5;"> 
<tr> <td colspan = 8 , align = "center">  LEDGER REPORT FOR : <?php echo $cname   ?>  </td>  </tr>

<th>SNO</th>  <th> DATE </th>    <th> ACC Type</th>   <th> NARRATION</th>     <th>*Debit*   </th>   <th>**Credit**  </th>   <th> Balance</th>  
   </tr> 


<?php
 
 
 
$i = 0;
$jk = 0;
		while($row = mysql_fetch_array($sql1))
		{$i = $i+1;
	
	$ttype = $row['detail'];
	
	$nara_type = $row['l_type'];
	
	
						 
				 
			  
         	  ?>
			  
			  
			  
		  
		     <tr>
		  
			  <td>  <?php echo $i   ?> </td>
			  <td>  <?php echo date("d-M-Y", strtotime($row['o_date']));  ?> </td>
				
			  
				
				<?php
				if($nara_type == "OPENING ACC")
				{  ?>
				
               	<td> <?php echo $row['l_type']   ?>  </td>
				
				<?php }  
				
				else
				{ ?>
				
					<td>  <a href ="<?php echo $row['scr_name']; ?>.php?id=<?php echo $row['refid']; ?>"><?php echo $row['l_type']   ?></a>  </td>
								
					
	               <?php

				}		?>
				
					<td>  <?php echo $row['detail']   ?> </td>
					
			  			 
			   <td>  <?php echo $row['debit']   ?> </td>
			   <td>  <?php echo $row['credit'];   ?> </td>
			   
			   
			   <?php
			   
			
$close_balance = $jk + $row['debit'] -  $row['credit']   ;
			   
			   ?>

			   <td>  <?php echo $close_balance   ?> </td>
			    
			 
			  
			</tr>
			
			<?php 
			
			 $jk = $close_balance;

		  }	
		  
		      $sql="UPDATE `customers` SET `net_due` = $close_balance  where `cid` = '$id'";

//echo $sql;

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
  ?>

</table>

</br>

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