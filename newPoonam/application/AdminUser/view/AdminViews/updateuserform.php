<?php
include("/var/www/html/Php-Programs/MVCPDO/application/AdminUser/view/AdminViews/admindashboard.php");
?>
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

<?php foreach ($users as $userInfo) : ?>  
<tr>	
<form method="POST" action="index.php?page=listuser">
<td><input type="text" name="name" value='<?= $userInfo['username']; ?>'/></td>
<td><input type="text" name="email" value='<?= $userInfo['email']; ?> '/></td>
<td><input type="text" name="contact" value='<?= $userInfo['contact'];?>'/></td>
<td><a href="index.php?page=edituser&userid=<?= $userInfo['uid'];?>">Edit</a> </td>
</form>

<?php 
if ($userInfo['status']==0) : ?>
<td>
<form method="POST" action="index.php?page=user">
<input type="hidden" name="action" value="enable">
<input type="hidden" name="userid" value="<?=$userInfo['uid'];?>">
<input type="submit" name="enable" value="Make Enable">
</form>
</td>

<?php 
else :?>
<td>
<form method="POST" action="index.php?page=user">
<input type="hidden" name="action" value="disable">
<input type="hidden" name="userid" value="<?=$userInfo['uid'];?>">
<input type="submit" name="disable" value="Make Disable">
</form>
</td>
<?php endif; ?>

<td> 
<form method="POST" action="index.php?page=user">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="userid" value="<?=$userInfo['uid'];?>">
<input type="submit" name="delete" value="Delete">
</form>
</td>

<?php endforeach;?>

</tr>
</tbody>
</table>

<?= $message ?>
</body>
</html>