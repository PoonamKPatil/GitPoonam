<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>change password</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php
echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
include("userClass.php");

if(isset($_SESSION['username'])) {
?><div class="nav">
  <a href="logout.php">Logout</a>
</div>
<form method="POST" action="">
Old password:<input type="password" name="oldpassword" value="<?php echo $user['password']?>"><br><br>
New password:<input type="password" name="newpassword" value="<?php echo $_POST['newpassword']?>"><br><br>
Confirm password:<input type="password" name="confirmpassword" value="<?php echo $_POST['confirmpassword']?>"><br><br>
<input type="submit" value="submit" name="submit" class="submit">
</form>


<?php
$userObj = new User();
$user=$userObj->viewProfile($_SESSION['username']);
//echo $uid;
if(isset($_POST['submit']))
{
    if(!empty($_POST['newpassword']) && !empty($_POST['confirmpassword']) && !empty($_POST['oldpassword'])&& ($_POST['newpassword']==$_POST['confirmpassword'])) {
    if($userObj->checkPassword(md5($_POST['oldpassword'])))
    {
    	$uid=$userObj->getUserByname($_SESSION['username']);
    	$userObj->changePassword($uid,md5($_POST['newpassword']));
    	 header("location:userLogin.php?msg=password changed successfully...login again!!");

    }
    else
    {
    	echo "provide correct details";
    }
}
else
{
	echo "empty field or new password and confirm password doesnt match";
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
