<?php


//$file1=$_FILES["file1"]["name"];
//$tmp_file1=$_FILES["file1"]["tmp_name"];


echo $_FILES["file1"]["tmp_name"];
echo "</br>";
echo $_FILES["file1"]["name"];


//$strfile="".$file1;

@mkdir("pic",0777);

move_uploaded_file($_FILES["file1"]["tmp_name"],"pic/" . $_FILES["file1"]["name"]);




?>
