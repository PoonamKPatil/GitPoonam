<!DOCTYPE html>
<html>
<head>
<title>Update users</title>
</head>
<body>
<table>
<tbody>
<tr>
<th>User Name</th>
<th>Email</th>
<th>Phone Number</th>
</tr>
<?php foreach ($resultArr as $userInfo) { 
?>  
<form method="post">
<tr>
<td><input type="text" name="name" value='<?php echo $userInfo['username']; ?>' /></td>
<td><input type="text" name="email" value='<?php echo $userInfo['email']; ?> '/></td>
<td><input type="text" name="contact" value='<?php echo $userInfo['contact'];?>'/></td>
<td><a href="adminedituser.php?userid=<?php echo $userInfo['uid'];?>">Edit</a> </td>
<?php 
if($userInfo['status']==0){ ?>
<td><input type="submit" name="enable" value="Enable"></td>
<?php 
}
else {?>
<td><input type="submit" name="disable" value="Disable"></td>
<?php }?>
<td> <input type="submit" name="delete" value="Delete">
</td>
<td><input type="hidden" name="oldname" value="<?php echo $rows['username']?>" ></td>
</tr>
</form>
<?php
}
?>
</tbody>
</table>
</body>
</html>