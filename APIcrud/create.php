<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// $data = json_decode(file_get_contents("php://input"), true);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'compass';
$connect = mysqli_connect($dbhost,$dbuser, $dbpass );

mysqli_select_db($connect,"info_db");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
   
    $insert_users_query = "INSERT INTO users (name, email,phone_number)
    VALUES ('$name','$email',$phone_number)";
   // var_dump($insert_users_query);
    if(mysqli_query($connect,$insert_users_query))
    {
        echo "succesfully inserted";

    }
    else
    {
        echo "error while inserting data ";
    }
        
}
?>
