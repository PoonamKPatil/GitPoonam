<!DOCTYPE html>
<html>
<head>
<title>Edit profile</title>
</head>
<body>
<form method="POST" action="index.php?page=adminedit&userid=<?php echo $user['uid'];?>>
Name:<input type="text" name="name" maxlength=20 value="<?php echo $user['username']?>" >
<span class=error><?= $nameErr ?></span><br><br>

Email:<input type="text" name="email" value="<?php echo $user['email']?>" >
<span class=error><?= $emailErr ?></span><br><br>

Phone Number:<input type="text" name="contact" value="<?php echo $user['contact']?>" >
<span class=error><?= $conatctErr ?></span><br><br>

<input type="submit" value="Save" name="submit" class="submit">
</form>
</body>
</html>
