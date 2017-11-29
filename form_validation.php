<?php
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = $comment = "";

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
    if (!preg_match("/^[a-zA-Z]*@gmail.com$/",$email)) {
        $emailErr = "Provide valid emailId"; 
    }
    
}
if (empty($_POST["password"])) {
    $passwordErr = "Please give password";
} 
else {
    $password = $_POST["password"];
  
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
    if(!preg_match("/^[9|7|8][0-9]*$/",$contact)) {
        $contactErr = "Enter valid mobile number";
    }
  
}
if(empty($_POST["code"])) {
    $codeErr = "Enter country code";
}
else if(!preg_match("/^[+][0-9]{2}$/",$_POST["code"])) {
    $codeErr = "Enter valid country number";
}  
else {
    $code=$_POST["code"];
}
if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
}
else {
    $gender = $_POST["gender"];
}
if (empty($_POST["comment"])) {
    $comment = "";
}
else {
    $comment = $_POST["comment"];
}
if(empty($_POST["courses"])) {
    $courseErr="Please select course";
}
else {
    $courses=$_POST["courses"];
}
if(empty($_POST["country"])) {
    $countryErr="Please select course";
}
else {
    $country=$_POST["country"];
}
if(empty($_POST["hobbie"])) {
    $hobbiesErr="Please select hobbie";
}
else {
    $Hobbies=$_POST["hobbie"];
}
if(empty($_POST["language"])) {
    $languageErr="Please select language";
}

}

?>

