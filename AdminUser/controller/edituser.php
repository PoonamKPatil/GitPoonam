<?php
    session_start();
    ob_start();
?>
<?php
include("../Model/userClass.php");
include("../Model/validation.php");

if(isset($_SESSION['username'])) {
    include("../view/userdashboard.php");

    $userObj = new User();
    $user=$userObj->viewProfile($_SESSION['username']);
    $uid=$userObj->getUserIdByname($_SESSION['username']);


    if(isset($_POST['submit']) && empty($nameErr) && empty($emailErr) && empty($conatctErr)) {
        if($userObj->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact'])) {
   	        $_SESSION['username']=$_POST['name'];
   	        echo "succesffuly updated";
        }

    }

    include("../view/edituserform.php");
}
else {
   header("location:../controller/userLoginController.php");
}
ob_end_flush();
?>

