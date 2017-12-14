
<?php
include("adminclass.php");

    if(isset($_POST['enable']) && $_POST['enable']==true) {
      //echo "hiiiiiiiiiiiiiiiiii";
       $adminObj = new Admin();
       $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->enableUser($uid);
        $status = array('status' => true);
       return json_encode($status);
     }
    if($_POST['disable']==true)) {
      //echo "hiiiiiiiiiiiiiiiiii";
       $adminObj = new Admin();
       $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->disableUser($uid);
       $status = array('status' => true);
       return json_encode($status);
    }
   if(isset($_POST['delete']) && $_POST['delete']==true)) {
       $adminObj = new Admin();
      $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->deleteUser($uid);
    }

?>
     
       
            
       