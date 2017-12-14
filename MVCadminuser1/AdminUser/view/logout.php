<?php
session_start();
?>
<DOCTYPE html!>
<html>
<head><title>Logout page</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "../style.css" />
</head>
<body>
<div class="nav">
  <a href="welcome.php">Home</a>
</div>
<?php
session_destroy();
?>
</body>
</html>