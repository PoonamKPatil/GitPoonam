<!DOCTYPE html>
<html>
<head>
<title>
Login page
</title>
<style type="text/css">
.error {color: #FF0000;}
.submit{
   background-color: #5A5256;
    border:none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
<div style="width: 500px; margin: 200px auto 0 auto;" >
<form method="POST" action="index.php?page=userlogin">
<h2 style="color: green"><?= $_GET['msg']?></h2><br><br>

User Name:<input type="text" name="name" value="<?php echo $_POST['name']?>">
<span class=error>*<?= $emptyErrorMsg['name'] ?></span><br><br>

Password:<input type="password" name="password" value="<?php echo $_POST['password']?>">
<span class=error>*<?= $emptyErrorMsg['password'] ?><br><br>

<input type="submit" name="login" value="LOGIN" class="submit">

<a href="index.php?page=registeruser">Register Here</a>
</span><br><br>
<h2 class="error"><?= $error;?></h2>
</form>
</div>
</body>
</html>