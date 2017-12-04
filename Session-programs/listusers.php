<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>List users</title>
<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
</head>
<body>
<?php
echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
include("DB_configuration.php");
if(isset($_SESSION['username'])) {
?><div class="nav">
  <a href="logout.php">Logout</a>
</div>
<?php
	echo "<h3 style=\"color:#4CAF50\";>Users are:</h3>";
    $qry="select * from usersInformation";
    $result=mysqli_query($connect,$qry) or die($qry."<br/><br/>".mysqli_error($connect));
    while($rows = mysqli_fetch_array($result)) {
    	echo $rows['uid'].")".$rows['username']."<br>"."EmailId:-".$rows['email']."<br><br>";
    }
}
else {
    header("location:login.php");
}
ob_end_flush();
?>
</body>
</html>
