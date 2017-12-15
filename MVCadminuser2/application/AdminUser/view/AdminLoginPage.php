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
<h2 style="color: green"><?php  echo $_GET['msg']?></h2><br><br>
<form method="POST" action="index.php?page=login">
User Name:<input type="text" name="name" value="<?php echo $_POST['name']?>"><span class=error>*<?php echo $emptyErrorMsg['name']; ?></span><br><br>
Password:<input type="password" name="password" value="<?php echo $_POST['password']?>"><span class=error>*<?php echo $emptyErrorMsg['password'] ?>
<br><br>
<input type="submit" name="login" value="LOGIN" class="submit">
</span><br><br>
<h2 class="error"><?php echo $error;?></h2>

</form>
</div>
</body>
</html>