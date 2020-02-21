<?php

include("config.php");

$term = $_GET[ "term" ];

$companies = array();



  $result13 = mysql_query("SELECT  upper(CONCAT(`desc`,' ',weight)) AS `desc` , `s_price`, `id`, `weight` FROM `m_master_store`  WHERE `desc`  like '%".$term."%' limit 0,50");
  
        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['id'],'label' => $row['desc']);
		   
			   
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