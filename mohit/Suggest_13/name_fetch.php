<?php
	include("../config.php");
	$keyword = $_POST['data'];
	
	


	$sql = "SELECT `id`,upper(CONCAT(`desc`,'**MRP**', `s_price`)) AS `desc` FROM `m_master_store`  WHERE  `desc`  like '%".$keyword."%' limit 0,20";

	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result))
	{
		echo '<ul class="list">';
		while($row = mysql_fetch_array($result))
		{
			$country_id = strtolower($row['0']);
			$first = strtoupper($row['1']);

			
			$final = '<span class="bold">'.$first.' </span>';

		
			echo '<li value='.$country_id.'  onclick=" h123(this.value);"  ><a href=\'javascript:void(0);\'>'.$final.'</a></li>';
		}
		echo "</ul>";
	}
	else
		echo 0;
?>	   
