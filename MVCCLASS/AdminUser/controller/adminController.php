<?php
include("../Model/adminclass.php");

include("../Model/valid.php");

include("../Model/userClass.php");

include("../Model/validation.php");

class AdminController
{

    public function loginValidation()
    {
        session_start();
        ob_start();
        $adminObj=new Admin();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($nameErr) && 
                empty($emailErr) && 
                empty($contactErr) && 
                empty($passwordErr) && 
                empty($confirmpasswordErr)
                ) {
                    $result=$adminObj->getUserByName($name);
        
                    if ($result['role_id']==USERROLEID) {
                        $error= "You are not admin<br>";
                    } else if ($result['password']==md5($password)) {
                        $_SESSION['username']=$name;
                        header("location:../view/admindashboard.php");
                    } else {
                        $error= "Invalid username or password<br>";
                    }
            }
        }
        include("../view/AdminLoginPage.php"); 
        ob_end_flush();   

    }


    public function adminChangePassword()
    {
        session_start();
        ob_start();
        if(isset($_SESSION['username'])) {

        include("../view/admindashboard.php");

        $adminObj = new Admin();
        $user=$adminObj->viewProfile($_SESSION['username']);


        if (isset($_POST['submit'])) {
            if (!empty($_POST['newpassword']) && 
                !empty($_POST['confirmpassword']) && 
                !empty($_POST['oldpassword']) && 
                ($_POST['newpassword']==$_POST['confirmpassword'])
                ) {
                    if ($adminObj->checkPassword(md5($_POST['oldpassword']))) {
                        $uid=$adminObj->getUserIdByname($_SESSION['username']);
                        $adminObj->changePassword($uid,md5($_POST['newpassword']));
                        header("location:../controller/adminLoginController.php?msg=password changed successfully...login again!!");
                    } else {
                        echo "provide correct details";
                    }
            } else {
                echo "empty field or new password and confirm password doesnt match";
            }
            include("../view/ChangePassword.php");
   
        }
        } else {
            header("location:../controller/adminLoginController.php");
       }
       ob_end_flush();  

    }

    public function adminEditUser() 
    {
        session_start();
        ob_start();
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

    }

    public function updateUser()
    {
        session_start();
        ob_start();
        if (isset($_SESSION['username'])) {
        include("../view/admindashboard.php");
            $adminObj = new Admin();
            $resultArr=$adminObj->getUsers();
            if (isset($_POST['enable'])) {
                $adminObj = new Admin();
                $uid=$adminObj->getUserIdByname($_POST['name']);
                $adminObj->enableUser($uid);
            }
            if (isset($_POST['disable'])) {
                $adminObj = new Admin();
                $uid=$adminObj->getUserIdByname($_POST['name']);
                $adminObj->disableUser($uid);   
            }  
            if (isset($_POST['delete'])) {
                $adminObj = new Admin();
                $uid=$adminObj->getUserIdByname($_POST['name']);
                $adminObj->deleteUser($uid);
            }
             include("../view/updateuserform.php");    
        } else {
                    header("location:../controller/adminLoginController.php");
        }
        ob_end_flush();  

    }


}
?>
