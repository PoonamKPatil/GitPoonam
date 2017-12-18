<!DOCTYPE html>
<html>
<head>
<title>View profile</title>
</head>
<body>
<br>
<h3 style="color:#4CAF50";>Your Details:</h3>
<table border="1px">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Contact</th>
	</tr>
	<tr>
	    <td><?=$user['username']?></td>
	    <td><?=$user['email']?></td>
	    <td><?=$user['contact']?></td>
	</tr>
</table>

</body>
</html>