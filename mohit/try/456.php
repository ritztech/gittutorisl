
<html>

<head>

<Title>Main Page</title>
<script language='javascript'>

function happycode(){


$var1 =  document.form.pdate.value;


<?php
header("Location: add_rec.php?id=$var1");
?>


 
  
}

</script>
</head>

<body   style="background-color:black;">

<div style="padding-left:100px;padding-bottom:10px;width:1000px;" >

<div id="header" style="background-color:#FFA500;">

<h1> <pre style="margin-bottom:0;">                  WELCOME TO THIS APPLICATION         </pre>  </h1>

</div>

<div id="menu" style="background-color:#FFD700;height:520px;width:100px;float:left;">
</br>
<b><a href="http://localhost/xampp/test/login/my_emp/grid/Insert_item.php">ADD ITEM</a></b>
<br> 
<b> <a href="http://localhost/xampp/test/login/my_emp/grid/welcome.php">BILL</a> </b></br>

</div>


<div id="content" style="background-color:#EEEEEE;height:520px;width:900px;float:left;">


<form  name = "form"   >

</br>

<input type = "text"  onChange="happycode()" name = "pdate"  id = "pdate"/>


</form>

</div>



</div>

</body>
</html>
