<DOCTYPE html!>
<html>
<head>
<title>
Person Details
</title>
<style type="text/css">
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
<form method="POST" action="">
Name:<input type="text" name="name" value="<?php echo $name?>"><span class=error>*<?php echo $nameErr ?></span><br><br>
Email:<input type="text" name="email" value="<?php echo $email?>"><span class=error>*<?php echo $emailErr ?></span><br><br>
Phone Number:<input type="text" name="contact" value="<?php echo $contact?>"><span class=error>*<?php echo $contactErr ?></span><br><br>
<input type="submit" value="submit" name="submit" class="submit">
</form>
</body>
</html>