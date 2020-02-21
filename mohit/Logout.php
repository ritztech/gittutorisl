<?php
	
        	//already logged in
          


session_start();
if(isset($_SESSION['logedin']))
  unset($_SESSION['logedin']);
  session_destroy();
  
  //header('Location: report/my_export_script.php');
  
    header('Location: index.php');

?>