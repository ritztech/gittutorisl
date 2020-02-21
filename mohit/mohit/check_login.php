        	<?php
			
           
			//include('config.php');
        	session_start();
			$_SESSION['pass123'] = "retail";
			 require('config.php');
	     //   include('chk_app.php');
			//  code for database backup   start
			$t_date = date("dmY");
			$result1 = mysql_query("SELECT `bck_date` FROM `db_bck`");
            $row1 = mysql_fetch_array($result1);
			$bck_date = $row1['0'];
			if($t_date != $bck_date )
			{
			
			include('db_backup_scr.php');
				
			$sqlupd1="UPDATE `db_bck` SET `bck_date`='$t_date'";
           
             if (!mysql_query($sqlupd1,$dbConn))	
               {
            die('Error: ' . mysql_error());
                } 
				
			}
			
	       // code for database backup   end
	
	
	
	
        	//already logged in
        	if(isset($_SESSION['logedin'])){ header('Location: welcome.php'); }
	
	  
	         $id = $_POST['username'];
			 
			 
			 


            $result = mysql_query("SELECT * FROM muser WHERE id = '$id'");
            $row = mysql_fetch_array($result);
			

			
			
	
                //checking if the $_post fields are empty
        	if($_POST['username'] == '' || $_POST['password'] == ''){
        	echo '<div class="360"><h3>Invalid input</h3></div>';
        	}elseif($_POST['username'] != $row['id'] || $_POST['password'] != $row['pass']){
        	echo '<div class="360"><h3>Invlaid username or password</h3></div>';
        	}else{
        	$_SESSION['uname']=$row['name'];
			$_SESSION['auth']=$row['auth'];
			       header('Location: welcome.php');
			
			} ?>
