<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
    $nameErr = "Name cannot be empty";
} 
else {
    $name = $_POST["name"];
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed"; 
    }
  
}

if (empty($_POST["email"])) {
    $emailErr = "Email is required";
} 
else {
    $email=$_POST["email"];
    if (!preg_match("/^[a-zA-Z0-9\_\.]*@(gmail|yahoo).com$/",$email)) {
        $emailErr = "Provide valid emailId"; 
    }
    
}
if (empty($_POST["password"])) {
    $passwordErr = "Please give password";
} 
else {
    $password = $_POST["password"];
    $pwd=md5($password);
  
}
if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "confirm your password";
} 
else {
    $confirmpassword = $_POST["confirmpassword"];
    if($confirmpassword!=$password) {
        $confirmpasswordErr = "Incorrect,Please type again";
    }
  
}
if (empty($_POST["contact"])) {
    $contactErr= "Give your contact number";
} 
else {
    $contact = $_POST["contact"];
    if(!preg_match("/^[9|7|8][0-9]{9}$/",$contact)) {
        $contactErr = "Enter valid mobile number";
    }
  
}
}
?>