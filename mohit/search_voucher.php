<?php

include("config.php");

$term = $_GET[ "term" ];

$companies = array();



  $result13 = mysql_query("SELECT cid as id, upper(CONCAT(`name`)) AS `name1`,name as acc_name FROM customers  WHERE  `name`  like '%".$term."%' limit 0,50");
  
        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['id'],'label' => $row['name1'],'label1' => $row['acc_name']   );
		   
			   
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