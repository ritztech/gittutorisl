<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

$t_date = date("d/m/Y");

if($_SESSION['auth'] == "NORMAL")
{
	
	$leg = "cust_ledger_rep.php";
	$i_leg = "cust_ledger_rep_i.php";
	//$i_leg = "show_sell_bill_d.php";
	
	
	$pay_sum = "Report_purchase_pay_summ.php";
}
else
{
	
		$leg = "cust_ledger_rep1_1.php";
		$i_leg = "cust_ledger_rep_i_1.php";
		$pay_sum = "Report_purchase_pay_summ1.php";
}

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>


</head>

<body>
<div align = "center"> <h3> CUSTOMER DETAILS   </h3></div>
<table width="100%" border="1" align="center">
  <tbody>
    <tr>
      <td>






<form name = "form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >


 <!DOCTYPE html>
<?php 
include('asw/db_con.php');
 
?>
 <link href="asw/css/bootstrap.min.css" rel="stylesheet">
          
       

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">
 

<div >
						   	       <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									<TR> <td colspan =9  align = "center" >  <INPUT class = "btn"  style="width:40%;"  Type="BUTTON" VALUE="ADD NEW CUSTOMER" ONCLICK="window.location.href='add_customer_front.php'">   </td>  </TR>
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										                                             <th>NAME</th>
                                            <th>CONTACT</th>
                                            <th>CITY</th>
                                            <th>NET DUE</th>
											
									
																														
											 										 
											
											  <?php if($_SESSION['auth'] == "NORMAL")
                                               { ?>
											   <th>DELETE</th>
											   
											   <?php  } ?>
											 
							
											
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
		

		
		
		$emp=("SELECT `cid`, `name`, `contact`, `city`, `net_due`  FROM `customers` where acctype = 1 ") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);


		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
<tr class="odd gradeX"><td style="width:201px;padding-left:10px;">
<a href="edit_customer_rec.php?id= <?php echo  $show['cid']?> "> <?php echo  $show['name']?>  </a>
</td>
<td style="width:150px;"> <?php  echo $show['contact'];  ?></td>
<td style="width:200px;"><?php  echo $show['city'];  ?></td>
<td>
<a href="cust_ledger_due_bills.php?id= <?php echo  $show['cid']?> "> <?php echo $show['net_due']?>  </a>

</td>









  <?php if($_SESSION['auth'] == "NORMAL")
                                               { ?>
<td style="width:201px;padding-left:10px;">
<a href="delete_all_accounts.php?id= <?php echo  $show['cid']?> "> DELETE </a>
</td>
											   <?php  }  ?>





                                        </tr>
                                     <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>
					  </div>
                    </div>
      </div>
     </div>
         
	
    <!-- Core Scripts - Include with every page -->
    <script src="asw/js/jquery-1.10.2.js"></script>
    <script src="asw/js/bootstrap.min.js"></script>
    <script src="asw/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="asw/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="asw/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="asw/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script><!-- /.modal --><!-- /.modal -->
    <!-- /.modal -->
</tr>
</table>




</div>






</div>
</div>
</div>

</form>



</div>
</div>
</div>

</td>
    </tr>
  </tbody>
</table>

</body>
</html> 