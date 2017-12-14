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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<?php
include("validation.php");
include("adminclass.php");

echo "<h2 style=\"color:purple\";>Hi  ".$_SESSION['username']."</h2>";
if(isset($_SESSION['username'])) {
?><div class="nav">
  <a href="updateuser.php">List User</a>
  <a href="adminchangepwd.php">Change password</a>
  <a href="logout.php">Logout</a>
</div>
<?php
	echo "<h3 style=\"color:#4CAF50\";>Users are:</h3>";
    $adminObj = new Admin();
    $result=$adminObj->getUsers();
?>
<table>
<tbody>
<tr>
<th>User Name</th>
<th>Email</th>
<th>Phone Number</th>
</tr>
<?php while ($userInfo = mysqli_fetch_array($result)) { 
?>  
<tr>
<td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' /></td>
<td><input type="text" name="email" value='<?php echo $userInfo['email']; ?> '/></td>
<td><input type="text" name="contact" value='<?php echo $userInfo['contact'];?>'/></td>

<?php 
if($userInfo['status']==0){ ?>
<td><button type="button" name="disable" onclick="disable(<?php echo $userInfo['uid'];?>)">Disable</button></td>
<?php 
}
else {?>
<td><button type="button" name="enable" onclick="enable(<?php echo $userInfo['uid'];?>)">Enable</button></td>
<?php }?>

<td><button type="button" name="deleteuser" value="deleteuser" onclick="deleteuser(<?php echo $userInfo['uid'];?>)">Delete</button>
</td>
</tr>
<?php
}
?>
</tbody>
</table>

<?php
}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
</body>
</html>
<script type="text/javascript">
function disable(uid) {
  console.log(uid);
  var dataValues = {
             type:disable,
             id:uid
           }
    $.ajax({ 
             type: 'POST',
             url: 'updateFunctions.php',
             data: { },
             dataType: 'json',  //response from server
             success: function (result) { 
             // console.log("hi");
               //alert("hi"+result.success);

             }
        });
 
}
function enable(uid) {
  console.log(uid);
  var dataValues = {
             type:enable,
             id:uid
           }
    $.ajax({ 
             type: 'POST',
             url: 'updateFunctions.php',
             data: { },
             dataType: 'json',  //response from server
             success: function (result) { 
             // console.log("hi");
               //alert("hi"+result.success);

             }
        });
 
}
function deleteuser(uid) {
  console.log(uid);
  var dataValues = {
             type:deleteuser,
             id:uid
           }
    $.ajax({ 
             type: 'POST',
             url: 'updateFunctions.php',
             data: { },
             dataType: 'json',  //response from server
             success: function (result) { 
             // console.log("hi");
               //alert("hi"+result.success);

             }
        });
 
}
</script>