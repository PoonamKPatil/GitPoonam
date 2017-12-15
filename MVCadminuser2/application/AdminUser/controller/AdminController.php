<?php

namespace Compassite\controller;

use Compassite\Model\Admin;
use Compassite\Model\User;
use Compassite\Model\Person;
use Compassite\Model\Validationn;

class AdminController
{
    public function loginValidation()
    {  
        $adminObj = new Admin();
        if(isset($_POST['login'])) {
           $doValidate  =  new Validationn($_POST);  
           $emptyErrorMsg = $doValidate->getError();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($emptyErrorMsg)) {
                    try {
                        
                        $user = $adminObj->getUserByName($_POST['name']);

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
                        header("location:".APP_URL."/index.php?page=login");
                    } else {
                        $error= "provide correct details";
                    }
            } else {
                $error= "empty field or new password and confirm password doesnt match";
            }
             
   
        }
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/admindashboard.php");
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/adminchangepassword.php");
       
    }

    public function adminEditUser() 
    {
        $uid=$_GET['userid'];
        $userObj = new User();
        $user=$userObj->getUserById($uid);
       
         
        if (isset($_POST['submit']) && 
            empty($nameErr) && 
            empty($emailErr) && 
            empty($conatctErr)
            ) {
                if ($userObj->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact'])) {
                    header("location:".APP_URL."/index.php?page=listuser");
                }
        }
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/admindashboard.php");
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser//view/adminedituserform.php");
        

    }

    public function updateUser()
    {
            $adminObj = new Admin();
            $resultArr=$adminObj->getUsers();
            if (isset($_POST['enable'])) {
                $adminObj = new Admin();
                $uid=$adminObj->getUserIdByname($_POST['name']);
                if ($adminObj->enableUser($uid)) {
                    $msg=$_POST['name']." Succesfuuly disabled";
                } else {
                    $msg=$_POST['name']."Error while disabeling";
                }
            }
            if (isset($_POST['disable'])) {
                $adminObj = new Admin();
                $uid=$adminObj->getUserIdByname($_POST['name']);
                if ($adminObj->disableUser($uid)) {
                    $msg=$_POST['name']." Succesfuuly enabled";
                } else {
                    $msg=$_POST['name']."Error while enabeling";
                }
            }  
            if (isset($_POST['delete'])) {
                $adminObj = new Admin();
                $uid=$adminObj->getUserIdByname($_POST['name']);
                if ($adminObj->deleteUser($uid)) {
                    $msg=$_POST['name']." Succesfuuly deleted";
                } else {
                    $msg=$_POST['name']." Error while deleting";
                }
            }
            include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/admindashboard.php");
             include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/updateuserform.php");    
    }


}
