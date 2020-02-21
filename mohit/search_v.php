<?php

include("config.php");

$term = $_GET[ "term" ];

$companies = array();



  $result13 = mysql_query("SELECT cid,upper(CONCAT(name,'**city**',city,'**Mobile**', contact)) AS  name11,name,contact FROM customers WHERE   acctype = 2  and CONCAT(name,'**city**',city,'***', contact) like '%".$term."%' limit 0,20");

        
        while($row = mysql_fetch_array($result13)) {
	  
		    $companies[] =  array( 'value' => $row['cid'],'label' => $row['name11'],'desc' => $row['contact'],'desc1' => $row['name']  );
		   
			   
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