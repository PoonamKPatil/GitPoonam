<DOCTYPE html!>
<html>
<head><title>Logout page</title>
</head>
<body>
<div class="nav">
  <a href="index.php?page=home">Home</a>
</div>
<?php
session_destroy();
?>
</body>
</html>