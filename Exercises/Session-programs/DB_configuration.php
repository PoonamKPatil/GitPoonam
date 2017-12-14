<?php 
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'compass';
$connect = mysqli_connect($dbhost,$dbuser, $dbpass );

    // connect to databsase 

mysqli_select_db($connect,"loginTest_db");

?>
   