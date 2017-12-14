<?php
class  UserController
{

    public function loginValidation() 
    {
        session_start();
        ob_start();
        include("../Model/userClass.php");

        include("../Model/valid.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($nameErr) && 
                empty($emailErr) && 
                empty($contactErr) && 
                empty($passwordErr) && 
                empty($confirmpasswordErr)
               ) {  
                   $adminObj=new User();
                   $result=$adminObj->getUserByName($name);
       
                   if ($result['role_id']==ADMINROLEID) {
                       $error= "You are not user<br>";
                    } else if ($result['password']==md5($password) && $result['status']==ACTIVE) {
    	                $_SESSION['username']=$name;
                        header("location:../view/userdashboard.php");
                    } else {
    	                $error= "Invalid username or password<br>";
                    }
                  } 
  
        }
        include("../view/UserLoginPage.php"); 
        ob_end_flush();   

    }


    public function userChangePassword()
    {
        session_start();
        ob_start();
        include("../Model/userClass.php");

        if (isset($_SESSION['username'])) {

        include("../view/userdashboard.php");

        include("../view/ChangePassword.php");

        $userObj = new User();
        $user=$userObj->viewProfile($_SESSION['username']);

        if (isset($_POST['submit'])) {
            if(!empty($_POST['newpassword']) &&
               !empty($_POST['confirmpassword']) &&
               !empty($_POST['oldpassword']) && 
               ($_POST['newpassword']==$_POST['confirmpassword'])
              ) {
                  if($userObj->checkPassword(md5($_POST['oldpassword']))) {
                      $uid=$userObj->getUserIdByname($_SESSION['username']);
                      $userObj->changePassword($uid,md5($_POST['newpassword']));
                      header("location:../controller/userLoginController.php?msg=password changed successfully...login again!!");
                   } else {
                       echo "provide correct details";
                   }
                } else {
                    echo "empty field or new password and confirm password doesnt match";
                }
        }
        } else {
            header("location:../controller/userLoginController.php");
        }
        ob_end_flush();

    }


    public function registerUser 
    {
        session_start();
        ob_start();
        include("../Model/validation.php");

        include("../Model/person.php");

        include("../view/registrationForm.php");

        if (isset($_POST['submit']) && 
            empty($nameErr) && 
            empty($emailErr) && 
            empty($contactErr) && 
            empty($passwordErr) && 
            empty($confirmpasswordErr)
           ) {
               $person = new Person($name,$pwd,$email,$contact,2);
               if($person->insert($person)) {
                   header("location:../controller/userLoginController.php?msg=You have successfully registered..Login here!!");
                }
        }
        ob_end_flush();
    }

    public function viewProfile()
    {
        session_start();
        ob_start();
        include("../Model/person.php");

        if (isset($_SESSION['username'])) {

            include("../view/userdashboard.php");

            echo "<h3 style=\"color:#4CAF50\";>Your Details:</h3>";
            $userObj = new Person();
            $user=$userObj->viewProfile($_SESSION['username']);

            echo "Name:".$user['username'];
            echo "<br>Email:".$user['email'];
            echo "<br>Contact:".$user['contact'];
        } else {
            header("location:adminLogin.php");
        }
        ob_end_flush();
    }


    public function editUser()
    {
        session_start();
        ob_start();
        include("../Model/userClass.php");

        include("../Model/validation.php");

        if (isset($_SESSION['username'])) {
            include("../view/userdashboard.php");

            $userObj = new User();
            $user=$userObj->viewProfile($_SESSION['username']);
            $uid=$userObj->getUserIdByname($_SESSION['username']);
 
            if (isset($_POST['submit']) && 
                empty($nameErr) && 
                empty($emailErr) && 
                empty($conatctErr)
               ) {
                   if ($userObj->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact'])) {
                       $_SESSION['username']=$_POST['name'];
                       echo "succesffuly updated";
                    }
            }
            include("../view/edituserform.php");

        } else {
            header("location:../controller/userLoginController.php");
        }
        ob_end_flush();
    }

}

?>