<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>view profile</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php
include("../Model/person.php");
if(isset($_SESSION['username'])) {
include("../view/userdashboard.php");

	echo "<h3 style=\"color:#4CAF50\";>Your Details:</h3>";
    $userObj = new Person();
    $user=$userObj->viewProfile($_SESSION['username']);

    echo "Name:".$user['username'];
    echo "<br>Email:".$user['email'];
    echo "<br>Contact:".$user['contact'];
}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>