<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php

$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
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
if(empty($_POST["course"]))
{
	$courseErr="Please select course";
}
else
{
	$course=$_POST["course"];
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
else
{
	$language=$_POST["language"];
}
}


?>
 <h3>Registration form </h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <lable>Name:</lable> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">*<?php echo $nameErr;?></span>
  <br><br>

<label>Email:</label><input type="text" name="email" value="<?php echo $email?>">
 <span class="error">*<?php echo $emailErr;?></span><br><br>
Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
<label>Cousre:</label>
<select name="course">
	<option value="">Select course</option>
	<option value="Java"<?php  if(isset($course) && $course=="Java") echo "selected"?>>Java</option>
	<option value="PHP" <?php  if(isset($course) && $course=="PHP") echo "selected"?>>PHP</option>
	<option value="C#" <?php  if(isset($course) && $course=="C#") echo "selected"?>>C#</option>
	<option value="C++" <?php  if(isset($course) && $course=="C++") echo "selected"?>>C++</option>
 <span class="error">*<?php echo $courseErr;?></span>
</select><br><br>


<label>Hobbies</label>
<select  name="hobbie[]" multiple="multiple" size="3">
<option value="Sports" <?php  if(isset($Hobbies) && $Hobbies=="Sports") echo "selected"?>>Sports</option>
<option value="Drawing" <?php  if(isset($Hobbies) && $Hobbies=="Drawing") echo "selected"?>>Drawing</option>
<option value="Dancing" <?php  if(isset($Hobbies) && $Hobbies=="Dancing") echo "selected"?>>Dancing</option>
<option value="Painting" <?php  if(isset($Hobbies) && $Hobbies=="Painting") echo "selected"?>>Painting</option>
<option value="Cooking" <?php  if(isset($Hobbies) && $Hobbies=="Cooking") echo "selected"?>>Cooking</option>
<span class="error">*<?php echo $hobbiesErr;?></span>
</select><br><br>

<label>Select Gender:</label><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>


<label>Languages known:</label><br>
<input type="checkbox" name="language[]" value="English" <?php if(isset($language) && $language=="English") echo "checked"?>>English<br>
<input type="checkbox" name="language[]" value="Hindi" <?php  if(isset($language) && $language=="Hindi") echo "checked"?>>Hindi<br>
<input type="checkbox" name="language[]" value="French" <?php if(isset($language)  && $language=="French") echo "checked"?>>French<br>
<input type="checkbox" name="language[]" value="Spanish" <?php if(isset($language) && $language=="Spanish") echo "checked"?>>Spanish<br>
<span class="error"><?php echo $languageErr;?></span><br><br>

<input type="submit" value="submit" name="submit">
</form>



<h3>Form details are</h3>
<?php

echo "Name: ".$name."<br>";
echo "Email: ".$email."<br>";
echo "Comment: ".$comment."<br>";
echo "Gender:".$gender."<br>";
echo "Course:".$course."<br>";
echo "Selected Hobbies:<br>";
foreach ($Hobbies as  $key=>$value) {
	echo ($key+1)." ".$value."<br>";
}
echo "Known languages:<br>";
foreach ($language as  $key=>$value) {
	echo ($key+1)." ".$value."<br>";
}
?>

</body>
</html>




