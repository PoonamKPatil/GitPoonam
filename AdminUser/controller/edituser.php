<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit profile</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php
include("../Model/userClass.php");

if(isset($_SESSION['username'])) {
include("../view/userdashboard.php");

$userObj = new Person();
$user=$userObj->viewProfile($_SESSION['username']);
?>
<br>
<form method="POST" action="">
Name:<input type="text" name="name" maxlength=20 value="<?php echo $user['username']?>"><br><br>
Email:<input type="text" name="email" value="<?php echo $user['email']?>"><br><br>
Phone Number:<input type="text" name="contact" value="<?php echo $user['contact']?>"><br><br>
<input type="submit" value="Save" name="submit" class="submit">
</form>
<?php
$userObj = new User();
$uid=$userObj->getUserByname($_SESSION['username']);
//echo $uid;
if(isset($_POST['submit'])) {
   if($userObj->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact']))
   {
   	 $_SESSION['username']=$_POST['name'];
   	 echo "succesffuly updated";
   }

}

}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>
