<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete users</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php
include("adminclass.php");

echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
if(isset($_SESSION['username'])) {
?>
      <div class="nav">
      <a href="logout.php">Logout</a>
      </div><br><br>
      <form method="post">
      <?php 
      $adminObj = new Admin();
      $userarray=$adminObj->getAllUsers();
      
      if(!empty($_POST["user"]))
      {
          $user=$_POST["user"];
      }
      ?>
     <label>User:</label>
     <select name="user">
      <option value="">Select user</option>
      <?php
         foreach($userarray as $value) { ?>
          <option value="<?php echo $value ?>" <?php  if(isset($user) && $user==$value)
          echo "selected"?>><?php echo $value ?>
          </option>
     <?php
    } ?>
 
</select><br>
      <input type="submit" action="" name="submit" value="Delete"><br>
      </form>

<?php 
if(isset($_POST['submit']) && !empty($_POST['user']))
{
    $adminObj = new Admin();
    $uid=$adminObj->getUserByname($_POST['user']);
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
