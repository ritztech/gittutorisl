<?php

$dir1 =  getcwd();
$file = $_SESSION['pass123'];
$pieces = explode("htdocs", $dir1);
$file_1 =  file_exists("$pieces[0]/$file.txt");

if($file_1 != "1")
{
		
if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            echo "$entry\n";
			//unlink ($entry);
			
        }
    }

    closedir($handle);
}
}




?>