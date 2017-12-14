<?php
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
?>
