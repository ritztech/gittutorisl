<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");


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
	
function deleterecord_1(refid,rowtodelete) {
	
	//alert(1);
	
 
	var scr1= "delete_voucher.php";
	
				 
				 


    if (confirm("Are you sure you want to delete this record  ?!") == true) {
		
	     	var strURL=scr1+"?id="+refid;
			//alert(strURL);
	var req = getXMLHTTP();
	
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	//location.reload(); 
	  var row = rowtodelete.parentNode.parentNode;
      row.parentNode.removeChild(row);

	  
	
	
	} else {
        x = "You pressed Cancel!";
    }
	
	 
}

</script>

</head>

<body>


<table width="100%" border="24" align="center">
  <tbody>
    <tr>
      <td>






<form name = "form2" method="post" action="purchase_add_back.php"  onSubmit="return ValidateForm()" >



 <!DOCTYPE html>
<?php 
include('asw/db_con.php');
 
?>
 <link href="asw/css/bootstrap.min.css" rel="stylesheet">
          
       

<h4  align = "center"> <B style="color:#B000FF; font-size:14px;">**** VOUCHER DETAILS **** </B></h4>
        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">
 

<div class="col-lg-8" style="width:100%;">
						   	       <div class="panel-body">
                            <div class="table-responsive" >
							
							
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
                                    <thead>
									<TR> <td colspan =13  align = "left" > 
<INPUT  class="abcqq"  Type="BUTTON" VALUE="ADD NEW " ONCLICK="window.location.href='voucher_f.php'">   </td>  </TR>
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF; font-size:12px;">
                                          <th width="2%">SNO.</th>	
										 <th width="10%" >VOUCHER NO.</th>										                                            
											<th>DEBIT ACCOUNT</th>
                                            <th>CREDIT ACCOUNT</th>
                                            <th>AMOUNT</th>
                                            <th width="10%">PAY TYPE</th>
                                              <th>DATE</th>
											  <th>NARRATION</th>
											   <th>DELETE</th>
											
														
											
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
		$emp=("SELECT v1.id,C1.name as debit,C2.name as credit,v1.amount as amount,v1.ptype as paytype,DATE_FORMAT(v1.tdate,'%d/%m/%Y') as pdate,
		v1.remark as remark,v1.refid as refid from voucher v1,customers c1,customers c2  where
c1.cid = v1.debitid
and c2.cid = v1.creditid ") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		$i=0;
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{$i = $i+1;
		
	?>
<tr class="odd gradeX">
<td style="width:50px;"> <?php  echo $i ?></td>
 <td style="width:50px;padding-left:10px;">
<a href="voucher_e_f.php?id= <?php echo  $show['id']?> "> <?php echo  $show['id']?>  </a>
</td>
<td style="width:200px;"> <?php  echo $show['debit'];  ?></td>
<td style="width:200px;"><?php  echo $show['credit'];  ?></td>
<td style="width:50px;"> <?php  echo $show['amount'];  ?></td>
<td style="width:50px;"> <?php  echo $show['paytype'];  ?></td>

<td style="width:100px;"> <?php  echo $show['pdate'];  ?></td>

<td style="width:300px;"> <?php  echo $show['remark'];  ?></td>
 <td align = "center"><input type='button' name='btnprint' value='DEL' class="abcqq"  onclick='deleterecord_1("<?php echo  $show['id'] ?>",this)'    /></td>



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