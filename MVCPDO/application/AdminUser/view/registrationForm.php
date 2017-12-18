<DOCTYPE html!>
<html>
<head>
<title>
Registration form
</title>
<style type="text/css">
.error {color: #FF0000;}
.submit{
   background-color: #5A5256;/* Green */
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
<form method="POST" action="index.php?page=registeruser">
Name:<input type="text" name="name" maxlength=20 value="<?= $_POST['name']?>">
<span class=error>*
<?= $emptyErrorMsg['name'] ?>
<?= $nameErr ?>	
</span><br><br>

Password:<input type="password" name="password" value="<?= $_POST['password']?>">
<span class=error>*
<?= $emptyErrorMsg['password'] ?>
<?= $passwordErr ?>		
</span><br><br>

confirm Password:<input type="password" name="confirmpassword" value="<?= $_POST['confirmpassword']?>"><span class=error>*
<?= $emptyErrorMsg['confirmpassword'] ?>
<?= $confirmpasswordErr ?>			
</span><br><br>

Email:<input type="text" name="email" value="<?= $_POST['email']?>">
<span class=error>*
<?= $emptyErrorMsg['email'] ?>
<?= $emailErr ?>			
</span><br><br>

Phone Number:<input type="text" name="contact" value="<?= $_POST['contact']?>">
<span class=error>*
<?= $emptyErrorMsg['contact'] ?>
<?= $contactErr ?>			
</span><br><br>
<input type="submit" value="submit" name="submit" class="submit">
</form>
</body>
</html>