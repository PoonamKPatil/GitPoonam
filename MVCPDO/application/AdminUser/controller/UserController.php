<?php
namespace Compassite\controller;

use Compassite\Model\Person;
use Compassite\Model\Admin;
use Compassite\Model\User;
use Compassite\Model\Validation;

class  UserController
{
    
    public function loginValidation() 
    {
        if(isset($_POST['login'])) {

            $doValidate  =  new Validation($_POST);  

            $emptyErrorMsg = $doValidate->getError();

        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($emptyErrorMsg)) {  

                $userObj = new User();

                $result = $userObj->getUserByName($_POST['name']);

                if ($result['role_id'] == Person::ADMINROLEID) {

                    $error = "You are not user<br>";

                } else {

                    $error = "Invalid username or password<br>";
                }

                if ($result['password'] == md5($_POST['password']) && 
                    $result['status'] == Person::ACTIVE) {

                    $_SESSION['username'] = $_POST['name'];

                    header("location:".APP_URL."/index.php?page=userdashboard");

                    exit();

                } 
                    
            } 
  
        }

        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/UserViews/UserLoginPage.php");

    }

    public function userChangePassword()
    {   
        $userObj = new User();

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

                    exit();

                } else {

                    $passerror = "Incorrect password";
                }

              } else {

                  $msg = "empty field or new password and confirm password doesnt match";
              }
        }
        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/UserViews/userchangepassword.php");
    }

    public function registerUser()
    {
        if(isset($_POST['submit'])) {

            $doValidate  =  new Validation($_POST);  

            $emptyErrorMsg = $doValidate->getError();
           
            if (empty($emptyErrorMsg)) {

                $contactErr = $doValidate->validMobile($_POST['contact']);

                $emailErr = $doValidate->validEmail($_POST['email']);

                $nameErr = $doValidate->validName($_POST['name']);
            }
           
            if ($_POST['password'] != $_POST['confirmpassword']) {

                $confirmpasswordErr = "Password MissMatch";

            }
        }
        if (isset($_POST['submit']) && 
            empty($emptyErrorMsg) && 
            empty($emailErr) && 
            empty($contactErr) && 
            empty($nameErr) &&
            empty($confirmpasswordErr)
           ) {
            $person = new Person($_POST['name'],md5($_POST['password']),$_POST['email'],$_POST['contact'],2);

            if($person->insert($person)) {

                header("location:".APP_URL."/index.php?page=userlogin&msg=Registered successfully !! login here");
                exit();
            }

        }

        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/UserViews/registrationForm.php");
    }

    public function viewProfile()
    {   
        $userObj = new Person();

        $user = $userObj->viewProfile($_SESSION['username']);

        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/UserViews/viewProfile.php");        
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
        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/UserViews/edituserform.php");
    }

}
