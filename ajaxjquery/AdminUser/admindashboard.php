<?php
    session_start();
    ob_start();
    echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
?>
<!DOCTYPE html>
<html>
<head><title>Dashbaord page</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php 
if(isset($_SESSION['username'])) {
?>
<div class="nav">
  <a class="active" href="#home">Home</a>
  <a href="updateuser.php">List Users</a>
  <a href="adminchangepwd.php">Change password</a>
  <a href="logout.php">Logout</a>
</div>
<?php }
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>