<?php
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
<div class="nav">
  <a class="active" href="#home">Home</a>
  <a href="index.php?page=viewprofile">View Profile</a>
  <a href="index.php?page=editprofile">Edit Profile</a>
  <a href="index.php?page=userchangepwd">Change password</a>
  <a href="index.php?page=logout">Logout</a>
</div>
</body>
</html>