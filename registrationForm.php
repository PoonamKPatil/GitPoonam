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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
     
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'registrationForm.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                   
                }

            });   
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'registrationForm.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
</head>

<?php
include("form_validation.php");
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'compass';
$connect = mysqli_connect($dbhost,$dbuser, $dbpass );

    // connect to databsase 

mysqli_select_db($connect,"user_db");

    // query the database 

$hobby_query = mysqli_query($connect,"SELECT * FROM hobbies");
$course_query = mysqli_query($connect,"SELECT * FROM courses");
$language_query= mysqli_query($connect,"SELECT * FROM languages");
$country_query=mysqli_query($connect,"SELECT * FROM countries");
   
?>

<body>
<h3>Registration Form </h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<lable>Name:</lable> <input type="text" name="name" value="<?php echo $name;?>">
<span class="error">*</span>
<br><br>


<lable>Password:</lable> <input type="password" name="password" maxlength="8" value="<?php echo $password;?>">
<span class="error">*<?php echo $passwordErr?></span>
<br><br>

<lable>Confirm Password:</lable> <input type="password"  maxlength="8" name="confirmpassword"
value="">
<span class="error">*<?php echo $confirmpasswordErr?></span>
<br><br>

<label>Email:</label><input type="text" name="email" value="<?php echo $email?>">
<span class="error">*</span><br><br>


Comment: <textarea name="comment" rows="5" cols="40" maxlength="255"><?php echo $comment;?></textarea>
<br><br>

<lable>Contact Number:</lable> 
<input type="text" placeholder="+91" name="code" size="4px" maxlength="4"  value="<?php echo $code;?>">
<input type="text"  maxlength="10" name="contact" value="<?php echo $contact;?>">
<span class="error">*</span>
<br><br>



<label>Cousre:</label>
<select name="courses">
    <option value="">Select course</option>
    <?php
    WHILE ($rows = mysqli_fetch_array($course_query)){?>
    <option name="course_id" value="<?php echo $rows['course_name'] ?>" <?php  if(isset($courses) && $courses==$rows['course_name'] )
    echo "selected"?>><?php echo $rows['course_name'] ?>
    </option>
    <?php 
    }?>
</select>

<span class="error">*</span>
<br><br>
<label>Hobbies</label><span class="error">*</span><br>
<select  name="hobbie[]" multiple="multiple" size="3">
<?php
    WHILE ($rows = mysqli_fetch_array($hobby_query)){?>
    <option value="<?php echo $rows['hobbie_name'] ?>" 
    <?php if(!empty($_POST["hobbie"])){
               $hobbie=$_POST["hobbie"];
               if (in_array($rows['hobbie_name'], $hobbie)) {
                   ?>selected="selected"<?php 
               }
            }?>
    >
    <?php echo $rows["hobbie_name"] ?>
    </option>
  <?php
    } ?>
</select>
<br><br>


<label>Country:</label>
<select name="country" id="country">
    <option value="">Select country</option>
    <?php
    WHILE ($rows = mysqli_fetch_array($country_query)){?>
    <option value="<?php echo $rows['country_name'] ?>" <?php  if(isset($country) && $country==$rows['country_name'])
    echo "selected"?>><?php echo $rows['country_name'];?>
    </option>
  <?php
    } ?>
 
</select>
<span class="error">*</span>
<br><br>

<label>State:</label>
<select name="state" id="state">
<?php

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $state_query = mysqli_query($connect,"SELECT * FROM states WHERE country_id = ".$_POST['country_id']);
    echo '<option value="">Select state</option>';
    while($row = mysqli_fetch_array($state_query)){ 
        print_r($row);
        echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
    }
   
}
?>
</select>
<br><br>
<label>City:</label>
<select name="city" id="city">
<?php
if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']);
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>
</select>
<br><br>

<label>Select Gender:</label><input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <span class="error">*</span>
<br><br>


<label>Languages known:</label><span class="error">*</span><br>
<?php
    WHILE ($rows = mysqli_fetch_array($language_query)){?>
        <input type="checkbox" name="language[]" value="<?php echo $rows['language_name']?>"
        <?php if(!empty($_POST["language"])) {
            $language=$_POST["language"];
            if (in_array($rows['language_name'], $language)) {
                ?>checked="checked"<?php 
            }
        }?>
        >
        <?php echo $rows['language_name']?><br>
    <?php } ?>
<br>

<input type="submit" value="submit" name="submit" class="submit">
</form>


<?php

if(!empty($language) && empty($nameErr) && empty($genderErr) && empty($emailErr) && empty($courseErr) && empty($hobbiesErr) && empty($languageErr)  && empty($contactErr) && empty($codeErr) && empty($countryErr)) {

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
    foreach ($language as $key=>$value) {
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
if(isset($_POST['submit']))
{

   /* $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];*/
      $course_id=$_POST['course_id'];
      echo $course_id;
    
    $sql = "INSERT INTO users (name, password, email,gender,comment,phone_number,created_date,course_id)
    VALUES ('$name','$password','$email','$gender','$comment','$contact',now(),'$course_id')";

    if(mysqli_query($connect,$sql))
    {
      echo "succesfully inserted";
    }
    else
    {
        echo "error while inserting data ";
    }
}
?>
</body>
</html>





