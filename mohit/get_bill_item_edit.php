<?phpinclude('config.php');$id=$_GET["q"];$result12 = mysql_query("SELECT `id`, `desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`,DATE_FORMAT(dop,'%d/%m/%Y') as dop,DATE_FORMAT(expdate,'%d/%m/%Y') as expdate,batchno FROM `m_master_store` WHERE id = $id");$row12 = mysql_fetch_array($result12);$v1= $row12['id'];$v2= $row12['desc'];$v3= $row12['s_price'];$v4= $row12['mrp'];$v5= $row12['qty'];$v6= $row12['trg'];$v7= $row12['barcode'];$v8= $row12['dop'];$v9= $row12['expdate'];$v10= $row12['batchno'];echo $v1 .",". $v2.",". $v3.",". $v4.",". $v5.",". $v6.",". $v7.",". $v8.",". $v9.",". $v10;mysql_close($dbConn);?> 