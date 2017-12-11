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
include("parentclass.php");
echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
if(isset($_SESSION['username'])) {
?><div class="nav">
  <a href="viewprofile.php">View Profile</a>
  <a href="edituser.php">Edit Profile</a>
  <a href="userChangePwd.php">Change password</a>
  <a href="logout.php">Logout</a>
</div>
<?php
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