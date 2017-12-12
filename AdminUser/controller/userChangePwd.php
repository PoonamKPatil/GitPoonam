<?php
    session_start();
    ob_start();
?>
<?php
include("../Model/userClass.php");
if(isset($_SESSION['username'])) {
include("../view/userdashboard.php");
include("../view/ChangePassword.php");
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
    	 header("location:../controller/userLoginController.php?msg=password changed successfully...login again!!");

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
    header("location:../controller/userLoginController.php");
}
ob_end_flush();
?>
