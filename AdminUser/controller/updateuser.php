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
  
  <a href="updateuser.php">List User</a>
  <a href="adminchangepwd.php">Change password</a>
  <a href="logout.php">Logout</a>
</div>
<?php
    //enable user
	echo "<h3 style=\"color:#4CAF50\";>Users are:</h3>";
    $adminObj = new Admin();
    $result=$adminObj->getAllDisableUsers();
    //echo $rows['username'];
    while ($rows = mysqli_fetch_array($result)){?>
      <form method="post" action="">
        <input type="text" style="width:150px"; name="name" value="<?php echo $rows['username']?>">
        <input type="text" name="email" value="<?php echo $rows['email']?>" >
        <input type="text" style="width:150px"; name="contact" value="<?php echo $rows['contact']?>" >
	       <a href="adminedituser.php?userid=<?php echo $rows['uid'];?>">Edit</a>
	    <input type="submit" name="enable" value="Enable">
	   <input type="submit" name="delete" value="Delete">
     <input type="hidden" name="oldname" value="<?php echo $rows['username']?>" >
	  </form>  
	   <?php echo "<br><br>";
	 }

   if(isset($_POST['enable'])) {
       $adminObj = new Admin();
       $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->enableUser($uid);
     }

     //disable  user
    $adminObj = new Admin();
    $result=$adminObj->getAllEnabledUsers();
    while ($rows = mysqli_fetch_array($result)){?>
      <form method="post" action="">
        <input type="text" style="width:150px"; name="name" value="<?php echo $rows['username']?>">
        <input type="text" name="email" value="<?php echo $rows['email']?>" >
        <input type="text" style="width:150px"; name="contact" value="<?php echo $rows['contact']?>">   
       <a href="adminedituser.php?userid=<?php echo $rows['uid']?>">Edit</a>
        <input type="submit" name="disable" value="Disable">
        <input type="submit" name="delete" value="Delete">
        <input type="hidden" name="oldname" value="<?php echo $rows['username']?>">
    </form>  
     <?php echo "<br><br>";
   }
   if(isset($_POST['disable'])) {
       $adminObj = new Admin();
       $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->disableUser($uid);
       
     }
     
     if(isset($_POST['delete'])) {
       $adminObj = new Admin();
      $uid=$adminObj->getUserByname($_POST['name']);
       $adminObj->deleteUser($uid);
     }
     if(isset($_POST['edit'])) {
       $adminObj = new Person();
       $obj=new Admin();
       $uid=$obj->getUserByname($_POST['oldname']);
      /* echo $_POST['name'];
        echo $_POST['email'];
         echo $_POST['contact'];*/       
       if($adminObj->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact']))
       {
           echo "Changes saved for ".$_POST['name'];
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
