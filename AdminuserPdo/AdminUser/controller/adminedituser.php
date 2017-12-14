<?php
session_start();
ob_start();

include("../Model/userClass.php");

include("../Model/validation.php");

if(isset($_SESSION['username'])) {
    include("../view/admindashboard.php");

    $uid=$_GET['userid'];
    $userobj = new Person();
    $user=$userobj->getUserById($uid);
    $usr=new User();
        if (isset($_POST['submit']) && 
          empty($nameErr) && 
          empty($emailErr) && 
          empty($conatctErr)
          ) {
              if ($usr->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact'])) {
   	              header("location:updateuser.php");
              }
        }
   include("../view/adminedituserform.php");
} else {
    header("location:adminLogin.php");
}

ob_end_flush();
?>
