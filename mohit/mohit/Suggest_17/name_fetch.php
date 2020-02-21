<?php
	include("../config.php");
	$keyword = $_POST['data'];
	
	

	$sql = "SELECT `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `dop`, `free_item`, `free_qty`, 
DATE_FORMAT(expdate,'%d/%m/%Y') as expdate, `batchno`, `purchase_id`, m1.id as id, `grp_id`, `catid`,weight,p1.name as cat_name 
FROM `m_master_store` m1,p_category p1 where p1.id = m1.catid  and `desc` like '%".$keyword."%' ORDER BY `desc` ASC LIMIT 0, 100";
	 

	$result = mysql_query($sql) or die(mysql_error());
	
	?>
	
<table width="100%" id = "mytable" cellspacing="5" bgcolor = "white" cellpadding="5" border="3" align="center">
	           <tr style="background-color:#B86B09; color:#FFFFFF;">
						  <th>  SNO </th>
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
	<?php
	if(mysql_num_rows($result))
	{
        $i = 0;
		while($row = mysql_fetch_array($result))
		{$i = $i + 1;
			$country_id = strtolower($row['0']);
			$iname = strtolower($row['2']);
			$iexp = strtolower($row['4']);
			//$first = strtoupper($row['1']);

			
			//$final = '<span class="bold">'.$first.' </span>';

		
			//echo '<li value='.$country_id.'  onclick=" h123(this.value);"  ><a href=\'javascript:void(0);\'>'.$final.'</a></li>';
			
			?>
			

   <td>  <?php    echo $i   ?> </td>
      <td> <?php echo  $row['cat_name'] ?>  </td>

<td style="width:301px;padding-left:10px;">
<a href="master_add_front_e.php?id=<?php echo  $row['id']?> "> <?php echo  $row['desc']?>  </a>

</td>
<td style="width:50px;"><?php  echo $row['weight'];  ?></td>

<td style="width:50px;"><?php  echo $row['qty'];  ?></td>
<td style="width:50px;">

<input type='text'  size = "5" name = "mrptext<?php echo   $i ?>"  value = "<?php  echo $row['mrp'];  ?>" onchange='updatemrp("<?php echo  $row['id'] ?>","<?php echo  $i ?>")'/>

</td>
<td style="width:50px;">

<input type='text'  size = "5" name = "sprice<?php echo   $i ?>"  value = "<?php  echo $row['s_price'];  ?>" onchange='updatemrp("<?php echo  $row['id'] ?>","<?php echo  $i ?>")'/>

</td>
<td style="width:100px;"> <?php  echo $row['batchno'];  ?></td>

<td style="width:100px;"> <?php  echo $row['barcode'];  ?></td>
<td style="width:30px;padding-left:10px;">
<a href="show_mrp_purchase.php?id=<?php echo  $row['purchase_id']?> "> <?php echo  $row['purchase_id']?>  </a>
</td>

<td>
<input type='button' name='btnprint' value='Delete' onclick='deleterecord_1("<?php echo  $row['id'] ?>",this)'/>


</td>

</tr>
			
			<?php



			}
		
	}
	
	
	else
		echo 0;
?>	   


</table>