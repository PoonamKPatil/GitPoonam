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
<?php foreach ($resultArr as $userInfo) : ?>  
<form method="post" action="index.php?page=listuser">
<tr>
<td><input type="text" name="name" value='<?= $userInfo['username']; ?>'/></td>
<td><input type="text" name="email" value='<?= $userInfo['email']; ?> '/></td>
<td><input type="text" name="contact" value='<?= $userInfo['contact'];?>'/></td>
<td><a href="index.php?page=adminedit&userid=<?= $userInfo['uid'];?>">Edit</a> </td>
<?php 
if ($userInfo['status']==INACTIVE) : ?>
<td><input type="submit" name="enable" value="Enable"></td>
<?php 
else :?>
<td><input type="submit" name="disable" value="Disable"></td>
<?php endif; ?>
<td> <input type="submit" name="delete" value="Delete">
</td>
<td><input type="hidden" name="oldname" value="<?= $rows['username']?>" ></td>
</tr>
</form>
<?php endforeach;?>
</tbody>
</table>
<?= $msg ?>
</body>
</html>