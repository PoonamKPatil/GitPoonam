<!DOCTYPE html>
<html>
<head>
<title>change password</title>
</head>
<body>
<form method="POST" action="index.php?page=changepwd">
<br>
Old password:<input type="password" name="oldpassword" value="<?php echo $user['password']?>"><br><br>
New password:<input type="password" name="newpassword" value="<?php echo $_POST['newpassword']?>"><br><br>
Confirm password:<input type="password" name="confirmpassword" value="<?php echo $_POST['confirmpassword']?>"><br><br>
<input type="submit" value="change" name="submit" class="submit">
</form>
</body>
</html>