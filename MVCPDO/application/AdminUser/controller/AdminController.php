<?php
namespace Compassite\controller;

use Compassite\Model\Admin;
use Compassite\Model\User;
use Compassite\Model\Person;
use Compassite\Model\Validation;

class AdminController
{
    private $msg;
    private $adminObj;

    function __construct() 
    {
        $this->adminObj = new Admin();
    }

    public function loginValidation()
    {  
       
        if(isset($_POST['login'])) {

            $doValidate  =  new Validation($_POST);  

            $emptyErrorMsg = $doValidate->getError();

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($emptyErrorMsg)) {

                try {                      
                        $user = $this->adminObj->getUserByName($_POST['name']);

                        if ($user['role_id'] == Person::USERROLEID) {

                            $error= "You are not admin<br>";

                        } else {

                            $error = "Invalid username or password<br>";
                        } 

                        if ($user['password'] == md5($_POST['password'])) {

                            $_SESSION['admin_username'] = $_POST['name'];

                            header("location:".APP_URL."/index.php?page=dashaboard");

                            exit();

                        } 

                } catch (\Exception $ex) {

                        echo $e->getMessage();
                }
            }
        }

        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/AdminViews/AdminLoginPage.php");        
    }
    
    public function adminChangePassword()
    {

        if (isset($_POST['submit'])) {

            if (!empty($_POST['newpassword']) && 
                !empty($_POST['confirmpassword']) && 
                !empty($_POST['oldpassword']) && 
                ($_POST['newpassword'] == $_POST['confirmpassword'])
                ) {

                    if ($this->adminObj->checkPassword(md5($_POST['oldpassword']))) {

                        $uid = $this->adminObj->getUserIdByname($_SESSION['admin_username']);

                        $this->adminObj->changePassword($uid,md5($_POST['newpassword']));

                        header("location:".APP_URL."/index.php?page=login&msg=Password changed!! login again");

                        exit();

                    } else {

                        $passerror = "Incorrect password";

                    }

            } else {

                $error = "empty field or new password and confirm password doesnt match";

            }       
        }

        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/AdminViews/adminchangepassword.php");
    }

    public function editUser() 
    {
        $uid = $_GET['userid'];

        $userObj = new User();

        $user = $userObj->getUserById($uid);

        if (isset($_POST['submit'])) {

            if ($userObj->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact'])) {

                header("location:".APP_URL."/index.php?page=listuser");

                exit();

            }
        }

        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/AdminViews/edituserform.php");

    }

    public function listUsers()
    {

        $users = $this->adminObj->getUsers();

        $message=$this->msg;

        include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/AdminViews/updateuserform.php");   
    }

    public function deleteUser()
    {
        if (isset($_POST['delete'])) {

            $uid = $_POST['userid'];

            if ($this->adminObj->deleteUser($uid)) {

                $this->msg = $_POST['name']." Succesfuuly deleted";

            } else {

                $this->msg = $_POST['name']." Error while deleting";
            }

        }

        $this->listUsers();    
    }
    
    public function disableUser()
    {

        if (isset($_POST['disable'])) {

            $uid = $_POST['userid'];

            if ($this->adminObj->disableUser($uid)) {

                $this->msg = $_POST['name']." Succesfuuly disabled";

            } else {

                $this->msg = $_POST['name']."Error while disabling";
            }

        }  

        $this->listUsers();    

    }

    public function enableUser()
    {
        if (isset($_POST['enable'])) {

            $uid = $_POST['userid'];

            if ($this->adminObj->enableUser($uid)) {

                $this->msg = $_POST['name']." Succesfuuly enabled";

            } else {

                $this->msg = $_POST['name']."Error while enabeling";
            }

        }

        $this->listUsers();  

    }

}
