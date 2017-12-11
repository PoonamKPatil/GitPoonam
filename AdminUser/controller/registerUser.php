<?php
ob_start();
include("validation.php");
include("../Model/parentclass.php");
include("../view/registrationForm.php");

if(isset($_POST['submit']) && empty($nameErr) && empty($emailErr) && empty($contactErr) && empty($passwordErr) && empty($confirmpasswordErr))
{
       $person = new Person($name,$pwd,$email,$contact,2);
       if($person->insert($person)) {
             header("location:userLogin.php?msg=You have successfully registered..Login here!!");
       }
}
ob_end_flush();
?>
