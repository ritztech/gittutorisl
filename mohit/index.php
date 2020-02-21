<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />

<Title>Login page</title>

</head>


<body>


		<?php 
			session_start();
			if(isset($_SESSION['logedin'])){ header('Location: welcome.php'); } 
		?>

		
		
<div id="logincontainer">  



<div >  <h1> PLEASE LOGIN HERE  </h1> </div>
</br>

	<form action="check_login.php" method="post">
	
<div>
	<div class="empleftDiv">Username:</div>
	<div class="emprightDiv"><input type="text" name="username" value="" />	</div>
</div>

<div>
	<div class="empleftDiv">Password:</div>
	<div class="emprightDiv"><input   type="password" name="password" value="" />	</div>
</div>

 <input type="submit" name="Submit" value="Login"  /> 

</br>

</form>
</div>
</body>
</html>


