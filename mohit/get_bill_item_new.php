<?phpinclude('config.php');$id=$_GET["q"];$result12 = mysql_query("SELECT `id`, `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`,free_qty ,grp_id,weight,tax_type FROM `m_master_store` WHERE barcode = '$id'");$row12 = mysql_fetch_array($result12);$v1= $row12['id'];$v2= $row12['desc'];$v3= $row12['s_price'];$v4= $row12['mrp'];$vfree_qty= $row12['free_qty'];$grp_id= $row12['grp_id'];$weight= $row12['weight'];$tax_type= $row12['tax_type'];$result1 = mysql_query("SELECT count(`id`) FROM `m_master_store` WHERE barcode = '$id'");$row1 = mysql_fetch_array($result1);$v5 = $row1['0'];if($v5 == 0){	$v1 = 0;	$v2 = 0;	$v3 = 0;	$v4 = 0;	$vfree_qty = 0;	$grp_id = 0;	}	echo $v1 .",". $v2.",". $v3.",". $v4.",". $v5.",". $vfree_qty.",". $grp_id.",". $weight.",". $tax_type;	mysql_close($dbConn);?> 