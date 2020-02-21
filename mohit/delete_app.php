
<?php

error_reporting(0);

$dir1 =  getcwd();
$file = $_SESSION['pass_app'];

$pieces = explode("htdocs", $dir1);
$con =  file_get_contents("$pieces[0]/$file.txt");

$pass1 = explode(",", $con);

echo $pass1[0];


?>