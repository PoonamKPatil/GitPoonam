<?php

namespace Compassite\controller;

use Compassite\Model\Admin;
use Compassite\Model\User;
use Compassite\Model\Validation;

class AdminController
{
    public function loginValidation()
    {  
        $adminObj = new Admin();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($nameErr) && 
                empty($emailErr) && 
                empty($contactErr) && 
                empty($passwordErr) && 
                empty($confirmpasswordErr)
                ) {
                    try {

                        $user = $adminObj->getUserByName($_POST['name']);

                        echo $user['password']."<br>";
                        echo  md5($_POST['password']);
                        if ($user['role_id'] == USERROLEID) {
                            $error= "You are not admin<br>";
                        } else if ($user['password'] == md5($_POST['password'])) {
                            $_SESSION['admin_username']=$_POST['name'];
                            header("location:".APP_URL."/index.php?page=dashaboard");
                        } else {
                            $error= "Invalid username or password<br>";
                        }
                    } catch (Exception $ex){
                        echo $e->getMessage();
                    }
            }
        }
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/AdminLoginPage.php"); 
        
    }


    public function adminChangePassword()
    {
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/admindashboard.php");
       
        $adminObj = new Admin();
        $user=$adminObj->viewProfile($_SESSION['admin_username']);


        if (isset($_POST['submit'])) {
            if (!empty($_POST['newpassword']) && 
                !empty($_POST['confirmpassword']) && 
                !empty($_POST['oldpassword']) && 
                ($_POST['newpassword']==$_POST['confirmpassword'])
                ) {
                    if ($adminObj->checkPassword(md5($_POST['oldpassword']))) {
                        $uid=$adminObj->getUserIdByname($_SESSION['admin_username']);
                        $adminObj->changePassword($uid,md5($_POST['newpassword']));
                        header("location:/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/AdminLoginPage.php");
                    } else {
                        echo "provide correct details";
                    }
            } else {
                echo "empty field or new password and confirm password doesnt match";
            }
            
   
        }
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/adminchangepassword.php");
       
    }

    public function adminEditUser() 
    {
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/admindashboard.php");
       
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
                    header("location:/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/updateuser.php");
                }
        }
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser//view/adminedituserform.php");
        

    }

    public function updateUser()
    {
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/admindashboard.php");
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
             include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/updateuserform.php");    
         
        


    }


}
