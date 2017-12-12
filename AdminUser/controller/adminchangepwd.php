<?php
    session_start();
    ob_start();
?>
<?php
include("../Model/adminclass.php");
if(isset($_SESSION['username'])) {
include("../view/admindashboard.php");
include("../view/ChangePassword.php");
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
    header("location:../controller/adminLoginController.php");
}
ob_end_flush();
?>

