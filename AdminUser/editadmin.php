<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit profile</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php
echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
include("adminclass.php");

if(isset($_SESSION['username'])) {
?><div class="nav">
  <a href="logout.php">Logout</a>
</div>
<form method="POST" action="">
Name:<input type="text" name="name" value="<?php echo $name?>"><span class=error>*<?php echo $nameErr ?></span><br><br>
Email:<input type="text" name="email" value="<?php echo $email?>"><span class=error>*<?php echo $emailErr ?></span><br><br>
Phone Number:<input type="text" name="contact" value="<?php echo $contact?>"><span class=error>*<?php echo $contactErr ?></span><br><br>
<input type="submit" value="submit" name="submit" class="submit">
</form>

<?php
	 

$adminObj = new Admin();
$uid=$adminObj->getUserByname($_SESSION['username']);
//echo $uid;
if(isset($_POST['submit'])) {
    $adminObj->editProfile($uid,$_POST['name'],$$_POST['email'],$_POST['contact']);
}

}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>
