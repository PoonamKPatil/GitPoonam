<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
.submit{
   background-color: #5A5256;/* Green */
    border:none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}

</style>
</head>
<body>
<?php

require "validation.php";


if(isset($_POST['submit'])) {
   $doValidate  =  new doValidate($_POST);  
   print_r($doValidate->getError());
}



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
  else
  {
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
    if($confirmpassword!=$password)
    {
        $confirmpasswordErr = "Incorrect,Please type again";
    }
  
  }


if (empty($_POST["contact"])) {
    $contactErr= "Give your contact number";
  } 
  else {
    $contact = $_POST["contact"];
    if(!preg_match("/^[9|7|8][0-9]*$/",$contact))
    {
        $contactErr = "Enter valid mobile number";
    }
  
  }

if(empty($_POST["code"]))
{

$codeErr = "Enter country code";

}

else if(!preg_match("/^[+][0-9]{2}$/",$_POST["code"]))
    {
        $codeErr = "Enter valid country number";
    }
    
else
{
     $code=$_POST["code"];
}



if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = $_POST["comment"];
  }
if(empty($_POST["courses"]))
{
  $courseErr="Please select course";
}
else
{
  $courses=$_POST["courses"];
}

if(empty($_POST["hobbie"]))
{
  $hobbiesErr="Please select hobbie";
}
else
{
  $Hobbies=$_POST["hobbie"];
}
if(empty($_POST["language"]))
 {
             $languageErr="Please select language";
}

}
$course=array("Java","C","PHP","C#");
$hobbies=array("Drawing","Dancing","Volleyball","Cooking","Painting");
$languages=array("English","Hindi","Spanish","French");

?>
 <h3>Registration form </h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <lable>Name:</lable> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">*</span>
  <br><br>
<lable>Password:</lable> <input type="password" name="password" maxlength="8" value="<?php echo $password;?>">
  <span class="error">*<?php echo $passwordErr?></span>
  <br><br>

<lable>confirm Password:</lable> <input type="password"  maxlength="8" name="confirmpassword" value="<?php echo $confirmpassword;?>">
  <span class="error">*<?php echo $confirmpasswordErr?></span>
  <br><br>
<label>Email:</label><input type="text" name="email" value="<?php echo $email?>">
 <span class="error">*</span><br><br>

Comment: <textarea name="comment" rows="5" cols="40" maxlength="255"><?php echo $comment;?></textarea>
  <br><br>

<lable>contact Number:</lable> 
<input type="text" placeholder="+91" name="code" size="4px" maxlength="4"  value="<?php echo $code;?>">
<input type="text"  maxlength="10" name="contact" value="<?php echo $contact;?>">
  <span class="error">*</span>
  <br><br>



<label>Cousre:</label>
<select name="courses">
  <option value="">Select course</option>
  <?php
    foreach($course as $value) { ?>
      <option value="<?php echo $value ?>" <?php  if(isset($courses) && $courses==$value)
       echo "selected"?>><?php echo $value ?>
      </option>
  <?php
    } ?>
 
</select>
<span class="error">*</span>
<br><br>
<label>Hobbies</label><span class="error">*</span><br>
<select  name="hobbie[]" multiple="multiple" size="3">
 <?php
    foreach($hobbies as $value) { ?>
      <option value="<?php echo $value ?>" 

     <?php if(!empty($_POST["hobbie"]))
          {

            $hobbie=$_POST["hobbie"];
            
            if (in_array($value, $hobbie)) 
            {
                ?>selected="selected"<?php 
            }
        }?>
      >
        <?php echo $value ?>
      </option>
  <?php
    } ?>

</select>

<br><br>
<label>Select Gender:</label><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">*</span>
  <br><br>


<label>Languages known:</label><span class="error">*</span><br>


<?php
    $languages=array("English","Hindi","Spanish","French");

    foreach ($languages as $value) 
    {?>
        <input type="checkbox" name="language[]" value="<?php echo $value?>"

        <?php if(!empty($_POST["language"]))
            {
             
               $language=$_POST["language"];
            
            if (in_array($value, $language)) 
            {
                ?>checked="checked"<?php 
            }
        }?>
        >
        <?php echo $value?><br>

    <?php } ?>

<br>

<input type="submit" value="submit" name="submit" class="submit">
</form>



<?php
if(!empty($language) && empty($nameErr) && empty($genderErr) && empty($emailErr) && empty($courseErr) && empty($hobbiesErr) && empty($languageErr)  && empty($contactErr) && empty($codeErr))
{

echo "<h2><b style=\"color: green\"> Succesfully registered !!.Your details have been saved.</b></h2>";

echo "<h3>Form details are:</h3>";
echo "Name: ".$name."<br>";
echo "Email: ".$email."<br>";
echo "Contact number: ".$code."-".$contact."<br>";
echo "Comment: ".$comment."<br>";
echo "Gender:".$gender."<br>";
echo "Course:".$courses."<br>";
echo "Selected Hobbies:<br>";

  foreach ($Hobbies as  $key=>$value) {
  echo ($key+1).")".$value."<br>";

}

echo "Known languages:<br>";


foreach ($language as $key=>$value) {
  echo ($key+1).")".$value."<br>";
}

}
else
{
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
  
  echo "</h4>";
  echo "</ul>";

}


?>

</body>
</html>




