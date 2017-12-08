<?php
    session_start();
    ob_start();
?>
<?php
include("DbClass.php");
$dbClass = new DBcontroller();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Enter username";
    } 
    else {
    	$name=$_POST['name'];
    }
    if(empty($_POST["password"])) {
        $passwordErr="Enter password";
    }
    else {
    	$password=$_POST['password'];
    } 
    if(empty($nameErr) && empty($emailErr) && empty($contactErr) && empty($passwordErr) && empty($confirmpasswordErr)) {   
        $qry="select username,password,role_id,status from usersInformation where username = '".$name."'";
        $userResult= $dbClass->runQry($qry) or die($qry."<br/><br/>".mysqli_error($connect));
        $rows = mysqli_fetch_array($userResult);
   // echo $rows['password']."<br>";
   // echo $password;
        if($rows['role_id']==1) {
            $error="You are not user<br>";
        }
        else if ($rows['password']==md5($password) && $rows['status']==1) {
    	    $_SESSION['username']=$name;
            header("location:userdashboard.php");
        }
        else {
    	    $error="Invalid username or password<br>";
        }
    } 
   // echo $rows['username'];   
 ob_end_flush();   
}
?>

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
<form method="POST" action="">
<h2 style="color: green"><?php  echo $_GET['msg']?></h2><br><br>
User Name:<input type="text" name="name" value="<?php echo $name?>"><span class=error>*<?php echo $nameErr ?></span><br><br>
Password:<input type="password" name="password" value="<?php echo $password?>"><span class=error>*<?php echo $passwordErr ?>
<br><br>
<input type="submit" name="login" value="LOGIN" class="submit">
<a href="registerUser.php">Register Here</a>
</span><br><br>
<h2 class="error"><?php echo $error;?></h2>
</form>
</div>
</body>
</html>