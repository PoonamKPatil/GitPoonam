<?php
    echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['admin_username']."</h2>";
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
  <a href="index.php?page=listuser">List Users</a>
  <a href="index.php?page=changepwd">Change password</a>
  <a href="index.php?page=logout">Logout</a>
</div>
</body>
</html>