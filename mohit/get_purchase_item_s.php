<?phpinclude('config.php');$id=$_GET["q"];$result12 = mysql_query("SELECT `itemid`, `itemname`,itemunit FROM `m_item_store`  WHERE itemid = $id");$row12 = mysql_fetch_array($result12);$v1= $row12['0'];$v2= $row12['1'];$v3= $row12['2'];echo $v1.",". $v2.",". $v3;mysql_close($dbConn);?> 