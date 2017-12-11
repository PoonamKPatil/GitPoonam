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
include("userClass.php");

if(isset($_SESSION['username'])) {
  $uid=$_GET['userid'];
  $userobj = new Person();
  $userarr=$userobj->getUserByid($uid);
?><div class="nav">
  <a class="active" href="#home">Home</a>
  <a href="updateuser.php">List Users</a>
  <a href="adminchangepwd.php">Change password</a>
  <a href="logout.php">Logout</a>
</div>
<br>
<?php
while ($user = mysqli_fetch_array($userarr)){?>
<form method="POST" action="">
Name:<input type="text" name="name" value="<?php echo $user['username']?>"><br><br>
Email:<input type="text" name="email" value="<?php echo $user['email']?>"><br><br>
Phone Number:<input type="text" name="contact" value="<?php echo $user['contact']?>"><br><br>
<input type="submit" value="Save" name="submit" class="submit">
</form>
<?php echo "<br><br>";
}
$usr=new User();
//echo $uid;
if(isset($_POST['submit'])) {
   if($usr->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact']))
   {
   	 header("location:updateuser.php");
   }

}

}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>
