<?php

include ('sample1_head.php');
//include ('sample1_left.php');
include("config.php");

$t_date = date("d/m/Y");


$query_dispMake1="SELECT id ,`name`FROM `p_category` ";
$result_dispMake1=mysql_query($query_dispMake1);




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
	
	
 
 function deleterecord_1(refid) {
	 
 
 var scr1= "delete_master_item.php";
	

    if (confirm("Are you sure you want to delete this item ...  ?!") == true) {
		
		
	     	var strURL=scr1+"?id="+refid;
			
		//	var strURL="scr1?id="+deleteId;
			
			
		//	alert(strURL);
			
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	location.reload(); 
	
	
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

  <tbody>
    <tr>
      <td><form name = "form1"  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

 </br>
	 
<table align="center" border = 1>

<tr>  <td  colspan = "2"  align = "center"><b> CATEGORY </b>  </td>    </tr>
<tr>


<td> <select name = "v_id"  style="width:150px"  >
		<?php 
     echo"<option value = 0>ALL</option>";
	while($query1_data = mysql_fetch_array($result_dispMake1)){
	 
	 echo"<option value = '{$query1_data['0']}'>{$query1_data['1']}</option>"; 

	 }
	 ?> </select> 
	 
	 

	 
	 
	 </td>    <td colspan = "2"  align = "center"> <input type="submit" name="submit" value="SHOW RECORDS">  </td>  </tr>

	 



</table>
</div>

</form>

<?php

include('config.php');

if(isset($_GET['submit']))
{


$vend_1 = $_GET['v_id'];

//echo $vend_1;

//echo "</br>";







if($vend_1 == "0")
{
	

	$result13 = ("SELECT `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `dop`, `free_item`, `free_qty`, 
	DATE_FORMAT(expdate,'%d/%m/%Y')  as  expdate, `batchno`, `purchase_id`, m1.id as id , `grp_id`, `catid`,weight ,p1.name as cat_name
	FROM `m_master_store` m1,p_category  p1  where  p1.id = m1.catid ");
			
	$result1_12 = mysql_query("SELECT sum(qty),sum(mrp*qty) FROM `m_master_store` ");
$row1_2 = mysql_fetch_array($result1_12);
$all_rec = $row1_2['0'];
$all_mrp = $row1_2['1'];

//$f_mrp = $all_rec*$all_mrp;

$items = 'ALL';

}

		
		
		else
			
			{
				
				$result1 = mysql_query("SELECT id ,`name`FROM `p_category` where id =  $vend_1 ");

 $row1 = mysql_fetch_array($result1);
 
 $items  = $row1['1'];
 
 
				
	$result13 = ("SELECT `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `dop`, `free_item`, `free_qty`,  DATE_FORMAT(expdate,'%d/%m/%Y')  as  expdate, `batchno`,
	`purchase_id`, m1.id as id, `grp_id`, `catid`,weight,p1.name as cat_name FROM  `m_master_store` m1,p_category  p1  where  p1.id = m1.catid and   m1.catid = '$vend_1' ");
			
	$result1_12 = mysql_query("SELECT sum(qty),sum(mrp*qty) FROM `m_master_store` where   `catid` = '$vend_1'");
$row1_2 = mysql_fetch_array($result1_12);
$all_rec = $row1_2['0'];
$all_mrp = $row1_2['1'];


				
				
				
			}






//echo $result13;
 

?>




<form name = "form2"  >




 <!DOCTYPE html>
<?php 
include('asw/db_con.php');
 
?>
 <link href="asw/css/bootstrap.min.css" rel="stylesheet">
          
       

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">
 

<div class="col-lg-8"  style="width:100%;" >
						   	       <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover"  id="dataTables-example">
                                    <thead>
									
									<tr style="background-color:#B86B09; color:#FFFFFF;" > <th colspan = 10  style="text-align:center;"> 
 <h4> YOUR INVENTORY   </h4>  </th>  </tr>
 <tr style="background-color:#B86B09; color:#FFFFFF;" > <th colspan = 10  style="text-align:center;"> 
 <h4> Total <?php echo $items;  ?> items available in your stock : <?php echo $all_rec;  ?>  of MRP : <?php echo $all_mrp;  ?>   </h4>  </th>  </tr>

                                        <tr style="background-color:#B86B09; color:#FFFFFF;">
                                         <th>CATEGORY</th>										 
										 <th >ITEM  NAME </th>
										 
										 <th>WEIGHT</th>
										   <th  >QTY</th>
                                            <th >MRP</th>
                                            <th>PRICE</th>
											<th>BATCH NO</th>
											<th>BARCODE</th>
											<th>PURCHASE RECORD</th>
											<th>DELETE</th>
											
                                        </tr>
                                    </thead>
                                    <tbody >
									
									<?php	
		$emp=$result13 or die(mysql_error());


		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
<tr class="odd gradeX">

<td style="width:70px;"><?php  echo $show['cat_name'];  ?></td>

<td style="width:201px;padding-left:10px;">
<a href="master_add_front_e.php?id=<?php echo  $show['id']?> "> <?php echo  $show['desc']?>  </a>

</td>
<td style="width:50px;"><?php  echo $show['weight'];  ?></td>

<td style="width:50px;"><?php  echo $show['qty'];  ?></td>
<td style="width:50px;"><?php  echo $show['mrp'];  ?></td>
<td style="width:50px;"> <?php  echo $show['s_price'];  ?></td>
<td style="width:100px;"> <?php  echo $show['batchno'];  ?></td>

<td style="width:100px;"> <?php  echo $show['barcode'];  ?></td>
<td style="width:150px;padding-left:10px;">
<a href="Report_purchase_show_rec.php?id=<?php echo  $show['purchase_id']?> "> <?php echo  $show['purchase_id']?>  </a>
</td>

<td><input type='button' name='btnprint' value='Delete' onclick='deleterecord_1("<?php echo  $show['id'] ?>")'/></td>



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

<?php } ?>


</div>
</div>
</div>

</td>
    </tr>
  </tbody>
</table>

</body>
</html> 