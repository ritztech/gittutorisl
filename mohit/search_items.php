<?php

include("config.php");

$term = $_GET[ "term" ];

$companies = array();




  $result13 = mysql_query("SELECT `itemid`,upper(itemname) AS `desc` FROM `m_item_store`  WHERE  `itemname`   like '%".$term."%' limit 0,50");
  
        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['itemid'],'label' => $row['desc'],'desc1' => $row['desc']  );
		   
			   
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