<?php

include('config.php');



$clname = trim(strip_tags(addslashes(strtoupper($_POST['clname']))));


$sql="INSERT INTO `p_category`(`name`) VALUES ('$clname')";


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>location.href='add_color.php'</script>";
	  
	  
  }
  


?>





