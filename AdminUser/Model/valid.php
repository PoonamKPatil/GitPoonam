<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Enter username";
    } 
    else {
        $name=$_POST['name'];
    }
    if(empty($_POST["password"])) {
        $passwordErr="Enter password";
    }
    else {
        $password=$_POST['password'];
    } 
 }
 ?>