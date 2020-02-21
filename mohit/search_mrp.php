<?php

include("config.php");

$term = $_GET[ "term" ];

$companies = array();



  $result13 = mysql_query("SELECT `id`,upper(CONCAT(`desc`,' ',weight,'**QTY**', `qty`,'**MRP**', `mrp`,'**BATCH**', `batchno`)) AS `desc`,`desc`  as i_name FROM `m_master_store`  WHERE  CONCAT(`desc`,'',weight)     like '%".$term."%' limit 0,50");
  
        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['id'],'label' => $row['desc'],'desc1' => $row['i_name']  );
		   
			   
		   }
		   
		   
		   


$result = array();
foreach ($companies as $company) {
	$companyLabel = $company[ "label" ];
	if ( strpos( strtoupper($companyLabel), strtoupper($term) )
	  !== false ) {
		array_push( $result, $company );
	}
}

echo json_encode( $result );
?>