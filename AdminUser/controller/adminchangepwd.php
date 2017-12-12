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
include("../Model/adminclass.php");
if(isset($_SESSION['username'])) {
  include("../view/admindashboard.php");
?>
<form method="POST" action="">
<br>
Old password:<input type="password" name="oldpassword" value="<?php echo $user['password']?>"><br><br>
New password:<input type="password" name="newpassword" value="<?php echo $_POST['newpassword']?>"><br><br>
Confirm password:<input type="password" name="confirmpassword" value="<?php echo $_POST['confirmpassword']?>"><br><br>
<input type="submit" value="change" name="submit" class="submit">
</form>


<?php
$adminObj = new Admin();
$user=$adminObj->viewProfile($_SESSION['username']);
//echo $uid;
if(isset($_POST['submit']))
{
    if(!empty($_POST['newpassword']) && !empty($_POST['confirmpassword']) && !empty($_POST['oldpassword'])&& ($_POST['newpassword']==$_POST['confirmpassword'])) {
    if($adminObj->checkPassword(md5($_POST['oldpassword'])))
    {
    	$uid=$adminObj->getUserByname($_SESSION['username']);
    	$adminObj->changePassword($uid,md5($_POST['newpassword']));
    	 header("location:../controller/adminLoginController.php?msg=password changed successfully...login again!!");

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
