<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Update users</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php
include("adminclass.php");

echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
if(isset($_SESSION['username'])) {
?><div class="nav">
  <a href="listusers.php">List Users</a>
  <a href="disable.php">Disable user</a>
  <a href="enable.php">Enable User</a>
  <a href="adminchangepwd.php">Change password</a>
  <a href="logout.php">Logout</a>
</div>
<?php
	echo "<h3 style=\"color:#4CAF50\";>Users are:</h3>";

    $adminObj = new Admin();
    $multiarr=$adminObj->getAllUsers();
    foreach ($multiarr as $value) {
	   foreach ($value as $key => $val) { ?>
      <form method="post" action="">
        <input type="text" name="name" value="<?php echo $val?>" readonly>
	      <?php }  ?>
	  <input type="submit" name="delete" value="Disable">
	  </form>  
	   <?php echo "<br><br>";
	 }
   if(isset($_POST['delete'])) {
       $adminObj = new Admin();
       $uid=$adminObj->getUserByphone($_POST['name']);
       $adminObj->deleteUser($uid);
     }
}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>
