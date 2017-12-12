<?php
    session_start();
    ob_start();
include("../Model/adminclass.php");
if(isset($_SESSION['username'])) {
include("../view/admindashboard.php");
   
	
    $adminObj = new Admin();
    $result=$adminObj->getUsers();
    //echo $rows['username'];  
	 include("../view/updateuserform.php");    

   if(isset($_POST['enable'])) {
       $adminObj = new Admin();
       $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->enableUser($uid);
     }
   if(isset($_POST['disable'])) {
       $adminObj = new Admin();
       $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->disableUser($uid);
       
     }
     
     if(isset($_POST['delete'])) {
       $adminObj = new Admin();
      $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->deleteUser($uid);
     }
  
}
else {
    header("location:../controller/adminLoginController.php");
}
ob_end_flush();
?>
