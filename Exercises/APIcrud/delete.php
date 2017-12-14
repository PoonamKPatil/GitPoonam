<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// $data = json_decode(file_get_contents("php://input"), true);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'compass';
$connect = mysqli_connect($dbhost,$dbuser, $dbpass );

mysqli_select_db($connect,"info_db");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $uid=$_GET['uid'];
   
    $delete_users_query = "DELETE from users where uid='".$uid."'";
    
    if(mysqli_query($connect,$delete_users_query))
    {
        echo "deleted succesfully";

    }
    else
    {
        echo "error while deleting data ";
    }
        
}
?>