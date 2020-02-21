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


</head>

<body>

<div align = "center"> <h1> VENDOR DETAILS   </h1></div>

<table width="100%" border="1" align="center">
  <tbody>
    <tr>
      <td>






<form name = "form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >

</br>

</b>




<br><br>


 <!DOCTYPE html>
<?php 
include('asw/db_con.php');
 
?>
 <link href="asw/css/bootstrap.min.css" rel="stylesheet">
          
       

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row" >
 

<div>
						   	       <div class="panel-body" >
                            <div class="table-responsive"  >
							
							
                                <table class="table table-striped table-bordered table-hover"   id="dataTables-example">
                                    <thead>
									<TR> <td colspan =13  align = "center" >  <INPUT class = "btn"  style="width:20%;"  Type="BUTTON" VALUE="ADD NEW " ONCLICK="window.location.href='add_acc_v.php'">   </td>  </TR>
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										                                             <th>NAME</th>
                                            <th>CONTACT</th>
                                            <th>CITY</th>
											 <th>NET DUE</th>
                                              <th>LEDGER</th>
																		
											
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
	$emp=("SELECT `cid`, `name`, `contact`, `city`, `net_due`  FROM `customers` where acctype = 2 ") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
<tr class="odd gradeX"><td style="width:201px;padding-left:10px;">
<a href="#edit_customer_rec.php?id= <?php echo  $show['cid']?> "> <?php echo  $show['name']?>  </a>
</td>
<td style="width:150px;"> <?php  echo $show['contact'];  ?></td>
<td style="width:200px;"><?php  echo $show['city'];  ?></td>
<td style="width:150px;"> <?php  echo $show['net_due'];  ?></td>

<td style="width:201px;padding-left:10px;">
<a href="cust_ledger_rep_acc_vendor.php?id= <?php echo  $show['cid']?> "> LEDGER  </a>



</td>





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
<script>

window.onload=document.form2.s_search_j.focus() ; 
</script>
</body>
</html> 