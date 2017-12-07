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
  <a href="logout.php">Logout</a>
</div>
<?php
	echo "<h3 style=\"color:#4CAF50\";>Your Details:</h3>";
    $adminObj = new Person();
    $adminObj->viewProfile($_SESSION['username']);
}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>