<?php
session_start();
ob_start();

include("../Model/adminclass.php");

include("../Model/valid.php");

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

?>
