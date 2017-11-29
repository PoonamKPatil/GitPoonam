<?php
//echo print_r("poonam");

//print echo "poonam";
/*
$var1=92;
$var2=13;
echo $var1.$var2."<br>";
print_r($var1.$var2."<br>");


echo $var1,$var2,"<br>";*/
//print_r($var1,$var2);

$myfile = fopen("test.txt", "r") or die("Unable to open file!");

if(file_exists("test.txt"))
{  
	echo "file type is ".filetype("test.txt")."<br>";
	echo "file size ".filesize("test.txt")."<br>";
	echo "file permission ".fileperms("test.txt")."<br>";
    while(!feof($myfile))
{
echo fgets($myfile)."<br>";
}
}
else {
    echo "No such file ";
}
fclose($myfile);




?>