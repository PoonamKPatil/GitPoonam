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

<?php
include("form_validation.php");
include("dbConfig.php");

    // query the database 
$hobby_query = mysqli_query($connect,"SELECT * FROM hobbies");
$course_query = mysqli_query($connect,"SELECT * FROM courses");
$language_query= mysqli_query($connect,"SELECT * FROM languages");
$country_query = mysqli_query($connect,"SELECT * FROM countries");
   
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

<lable>Confirm Password:</lable>
 <input type="password"  maxlength="8" name="confirmpassword" value="<?php echo $confirmpassword;?>">
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
      <option value="<?php echo $rows['course_id'] ?>" <?php  if(isset($courses) && $courses==$rows['course_id'])
       echo "selected"?>><?php echo  $rows['course_name']  ?>
      </option>
  <?php
    } ?>
 
</select>
<span class="error">*</span>
<br><br>

<label>Hobbies</label><span class="error">*</span><br>
<select  name="hobbie[]" multiple="multiple" size="3">
<?php
    WHILE ($rows = mysqli_fetch_array($hobby_query)){?>
    <option value="<?php echo $rows['hobby_id'] ?>" 
    <?php if(!empty($_POST["hobbie"])){
               $hobbie=$_POST["hobbie"];
               if (in_array($rows['hobby_id'], $hobbie)) {
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


<label>Country:</label><span class="error">*</span>
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

<label>Select Gender:</label><span class="error">*</span>
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="transgender") echo "checked";?> value="transgender">Transgender

<br><br>


<label>Languages known:</label><span class="error">*</span><br>
<?php
    WHILE ($rows = mysqli_fetch_array($language_query)){?>
        <input type="checkbox" name="language[]" value="<?php echo $rows['language_id']?>"
        <?php if(!empty($_POST["language"])) {
            $language=$_POST["language"];
            if (in_array($rows['language_id'], $language)) {
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
if(isset($_POST['submit']) && empty($nameErr) && empty($genderErr) && empty($emailErr) && empty($courseErr) && empty($hobbiesErr) && empty($languageErr)  && empty($contactErr) && empty($codeErr) && empty($countryErr) && empty($passwordErr) && empty($confirmpasswordErr))
{

    $insert_users_query = "INSERT INTO users (name, password, email,gender,comment,phone_number,created_date,course_id)
    VALUES ('$name','$password','$email','$gender','$comment','$contact',now(),'$courses')";
    if(mysqli_query($connect,$insert_users_query))
    {
        echo "succesfully inserted";

        $userId_query = "select uid from  users where name='".$name."'";
        $userResult= mysqli_query($connect,$userId_query);
        $rows = mysqli_fetch_array($userResult);
        $uid= $rows['uid'];
   
    //insert languagges 
      foreach ($language as $key => $value) {
       $insert_languages_query="INSERT INTO user_languages (user_id, language_id)
       VALUES ('$uid','$value')";
        mysqli_query($connect,$insert_languages_query);

    }
  
    foreach ($hobbie as $key => $value) {
       $insert_hobbies_query="INSERT INTO user_hobbies (user_id, hobby_id)
       VALUES ('$uid','$value')";
        mysqli_query($connect,$insert_hobbies_query);

    }
    }
    else
    {
        echo "error while inserting data ";
    }
    //get userid
    
   
    
}
?>
</body>
</html>





