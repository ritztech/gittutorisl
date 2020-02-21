<?php

include ('header.php');
//include ('sample1_left.php');
include("config.php");

$t_date = date("d/m/Y");



?>

<html>
<head>



<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />


<script language="javascript" type="text/javascript" src="jscode/datetimepicker.js"> </script>

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
	

function deleterecord(deleteId) {
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="delete_firm_work.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='assignwork_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>


</head>

<body>
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
                        
   <div class="row">
 

<div class="col-lg-8" style="width:100%;">
						   	       <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									<tr>  <td COLSPAN = "7" align = "center">   ALL ASSIGNED WORK DETAILS   </td>  </tr>
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										                                             <th>FIRM NAME</th>
                                            <th>FINANCIAL YEAR</th>
                                            <th>EMPLOYEE</th>
                                            <th>TAX CATEGORY</th>
											<th>WORK TYPE</th>
                                              <th>STATUS</th>
											  <th>START DATE</th>
											  <th>END DATE</th>
											  <th>  DELETE </th>
													
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
		$emp=("SELECT `id`, `fname`, `fyear`, `work_type`, `emp_name`, DATE_FORMAT(sdate,'%d/%m/%Y') as sdate, DATE_FORMAT(edate,'%d/%m/%Y') as edate, `remark`, `status`, `comm`,tax_type FROM `work` where status = 'OPEN' order by id desc ") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		
				
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
<tr class="odd gradeX"><td style="width:201px;padding-left:10px;">
<a href="work_edit_view.php?id= <?php echo  $show['id']?> "> <?php echo  $show['fname']?>  </a>
</td>
<td style="width:100px;"> <?php  echo $show['fyear'];  ?></td>
<td style="width:100px;"><?php  echo $show['emp_name'];  ?></td>
<td style="width:150px;"> <?php  echo $show['tax_type'];  ?></td>
<td style="width:150px;"> <?php  echo $show['work_type'];  ?></td>
<td style="width:50px;"> <?php  echo $show['status'];  ?></td>
<td style="width:50px;"> <?php  echo $show['sdate'];  ?></td>
<td style="width:50px;"> <?php  echo $show['edate'];  ?></td>
<td style="width:50px;" > <input type='button' name='btnprint' value='Delete' class="button2" onclick='deleterecord(<?php echo $show['id']; ?>)'/></td>


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