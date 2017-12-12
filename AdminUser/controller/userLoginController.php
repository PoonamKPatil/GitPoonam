<?php
    session_start();
    ob_start();
?>
<?php
include("../Model/userClass.php");
include("../Model/valid.php");
$adminObj=new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($nameErr) && empty($emailErr) && empty($contactErr) && empty($passwordErr) && empty($confirmpasswordErr)) {  

       $result=$adminObj->getUserByName($name);
       
        if($result['role_id']==ADMINROLEID) {
            $error= "You are not user<br>";
        }
        else if ($result['password']==md5($password) && $result['status']==ACTIVE) {
    	    $_SESSION['username']=$name;
            header("location:../view/userdashboard.php");
        }
        else {
    	    $error= "Invalid username or password<br>";
        }
    } 
   // echo $result['username'];   
 ob_end_flush();  

}
include("../view/UserLoginPage.php"); 
?>