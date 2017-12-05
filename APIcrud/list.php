<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



$name="poonam";
$phone_number=9876543223;
$email="poonam@gmail.com";
$arr=array("name"=>$name,"phone_number"=>$phone_number,"email"=>$email);

echo json_encode($arr);
//print_r($arr);

?>