<?php
namespace Compassite\controller;

use Compassite\Model\Person;
use Compassite\Model\Admin;
use Compassite\Model\User;
use Compassite\Model\Validationn;

class  UserController
{
    public function loginValidation() 
    {
        if(isset($_POST['login'])) {
           $doValidate  =  new Validationn($_POST);  
           $emptyErrorMsg = $doValidate->getError();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($emptyErrorMsg)) {  
                     $userObj = new User();
                     $result = $userObj->getUserByName($_POST['name']);
                   if ($result['role_id'] == ADMINROLEID) {
                       $error = "You are not user<br>";
                    } else if ($result['password'] == md5($_POST['password']) && $result['status']==ACTIVE) {
                        $_SESSION['username'] = $_POST['name'];
                         header("location:".APP_URL."/index.php?page=userdashboard");
                    } else {
                        $error = "Invalid username or password<br>";
                    }
                  } 
  
        }
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/UserLoginPage.php");

    }


    public function userChangePassword()
    {   
        $userObj = new User();
        $user = $userObj->viewProfile($_SESSION['username']);

        if (isset($_POST['submit'])) {
            if(!empty($_POST['newpassword']) &&
               !empty($_POST['confirmpassword']) &&
               !empty($_POST['oldpassword']) && 
               ($_POST['newpassword'] == $_POST['confirmpassword'])
              ) {
                  if($userObj->checkPassword(md5($_POST['oldpassword']))) {
          
                      $uid = $userObj->getUserIdByname($_SESSION['username']);
                
                      $userObj->changePassword($uid,md5($_POST['newpassword']));

                      header("location:".APP_URL."/index.php?page=userlogin&msg=Password changed!! login again");

                   } else {
                       $msg = "provide correct details";
                   }
                } else {
                    $msg = "empty field or new password and confirm password doesnt match";
                }
           }
           include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/userdashboard.php");
           include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/userchangepassword.php");
        

    }


    public function registerUser()
    {
        if(isset($_POST['submit'])) {
           $doValidate  =  new Validationn($_POST);  
           $emptyErrorMsg = $doValidate->getError();
        }
        if (isset($_POST['submit']) && 
            empty($emptyErrorMsg) && 
            empty($emailErr) && 
            empty($contactErr) && 
            empty($passwordErr) && 
            empty($confirmpasswordErr)
           ) {
               $person = new Person($_POST['name'],md5($_POST['password']),$_POST['email'],$_POST['contact'],2);
               if($person->insert($person)) {
                   header("location:".APP_URL."/index.php?page=userlogin&msg=Registered successfully !! login here");
                }
        }
        include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/registrationForm.php");
    }

    public function viewProfile()
    {
            include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/userdashboard.php");

            echo "<h3 style=\"color:#4CAF50\";>Your Details:</h3>";
            $userObj = new Person();
            $user = $userObj->viewProfile($_SESSION['username']);

            echo "Name:".$user['username'];
            echo "<br>Email:".$user['email'];
            echo "<br>Contact:".$user['contact'];
         
    }


    public function editUser()
    {
            
            $userObj = new User();
            $user = $userObj->viewProfile($_SESSION['username']);
            $uid = $userObj->getUserIdByname($_SESSION['username']);
            if (isset($_POST['submit']) && 
                empty($nameErr) && 
                empty($emailErr) && 
                empty($conatctErr)
               ) {
                   if ($userObj->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact'])) {
                       $_SESSION['username'] = $_POST['name'];
                       $successmsg = "succesffuly updated";
                    }
            }
            include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/userdashboard.php");

            include("/var/www/html/Php-Programs/MVCadminuser2/application/AdminUser/view/edituserform.php");
    }

}
