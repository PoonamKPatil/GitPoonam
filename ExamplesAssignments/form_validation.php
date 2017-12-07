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
    if (!preg_match("/^[a-zA-Z0-9\_\.]*@(gmail|yahoo).com$/",$email)) {
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
else if(!preg_match("/^[+][0-9]{2,3}$/",$_POST["code"])) {
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
else
{
    $Language=$_POST['language'];
}

}

if(isset($_POST['submit']))
{
if(empty($nameErr) && empty($genderErr) && empty($emailErr) && empty($courseErr) && empty($hobbiesErr) && empty($languageErr)  && empty($contactErr) && empty($codeErr) && empty($countryErr) && empty($passwordErr) && empty($confirmpasswordErr)) {

    echo "<h2><b style=\"color: green\"> Succesfully registered !!.Your details have been saved.</b></h2>";
    echo "<h3>Form details are:</h3>";
    echo "Name: ".$name."<br>";
    echo "Email: ".$email."<br>";
    echo "Contact number: ".$code."-".$contact."<br>";
    echo "Comment: ".$comment."<br>";
    echo "country: ".$country."<br>";
    echo "Course:".$courses."<br>";
    echo "Selected Hobbies:<br>";


    foreach ($Hobbies as  $key=>$value) {
        echo ($key+1).")".$value."<br>";

    }
    echo "Known languages:<br>";
    foreach ($Language as $key=>$value) {
        echo ($key+1).")".$value."<br>";
    }

}
else {
  echo "<h3><b style=\"color: red\"> Failed to save details :(<br>Please specify mandatory and proper details</b></h3>";
  echo "<h4 style=\"color: #c82d0c\">";

  echo "<ul>";
  if(!empty($nameErr))
  {
    echo "<li>".$nameErr."</li><br>";
  }
  if(!empty($emailErr))
  {
    echo "<li>".$emailErr."</li><br>";
  }
   if(!empty($codeErr))
  {
    echo "<li>".$codeErr."</li><br>";
  }
   if(!empty($contactErr))
  {
    echo "<li>".$contactErr."</li><br>";
  }
  if(!empty($courseErr))
  {
      echo "<li>You have not selected any course</li><br>";
  }
  if(!empty($languageErr))
  {
       echo "<li>Provide known languages</li><br>";
  }
  if(!empty($hobbiesErr))
  {
        echo "<li>Specify your hobbies</li><br>";
  }
  if(!empty($genderErr))
  {
       echo "<li>Select gender</li><br>";
  }
   if(!empty($countryErr))
  {
       echo "<li>Select country</li><br>";
  }
  echo "</h4>";
  echo "</ul>";

}
}


?>

