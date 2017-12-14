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
      $emailErr = "Invalid email"; 
    }
    
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
  <span class="error">*<?php echo $nameErr;?></span>
  <br><br>

<label>Email:</label><input type="text" name="email" value="<?php echo $email?>">
 <span class="error">*<?php echo $emailErr;?></span><br><br>
Comment: <textarea name="comment" rows="5" cols="40" maxlength="255"><?php echo $comment;?></textarea>
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
<span class="error">*<?php echo $courseErr;?></span>
<br><br>
<label>Hobbies</label><span class="error">*<?php echo $hobbiesErr;?></span><br>
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
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>


<label>Languages known:</label><span class="error">*<?php echo $languageErr;?></span><br>


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

<br><br>

<input type="submit" value="submit" name="submit">
</form>



<?php
if( !empty($language) && empty($nameErr) && empty($genderErr) && empty($emailErr) && empty($courseErr) && empty($hobbiesErr) && empty($languageErr) )
{

echo "<h2><b style=\"color: green\"> Succesfully registered !!.Your details has been saved.</b></h2>";

echo "<h3>Form details are:</h3>";
echo "Name: ".$name."<br>";
echo "Email: ".$email."<br>";
echo "Comment: ".$comment."<br>";
echo "Gender:".$gender."<br>";
echo "Course:".$courses."<br>";
echo "Selected Hobbies:<br>";

if(!empty($_POST["hobbie"]))
{
  foreach ($Hobbies as  $key=>$value) {
  echo ($key+1)." ".$value."<br>";
}
}

echo "Known languages:<br>";

if(!empty($_POST["language"]))
{
foreach ($language as  $key=>$value) {
  echo ($key+1)." ".$value."<br>";
}
}
}
else
{

  echo "<h2><b style=\"color: red\"> Failed to save details :(</b></h2>";
  echo "<h3><b style=\"color: red\"> Please specify mandatory and proper deatils</b></h3>";
echo "<h4>";
  echo $nameErr."<br><br>";
  echo $emailErr."<br><br>";
  echo $courseErr."<br><br>";
  echo $languageErr."<br><br>";
  echo $hobbiesErr."<br><br>";
  echo $genderErr."<br><br>";
       echo "</h4>";

}


?>

</body>
</html>




