<?php
    session_start();
    ob_start();
?>
<?php
include("../Model/DbClass.php");
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
 }

$dbClass = new DBcontroller();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($nameErr) && empty($emailErr) && empty($contactErr) && empty($passwordErr) && empty($confirmpasswordErr)) {

        $qry="select username,password,role_id from usersInformation where username = '".$name."'";
        $userResult= $dbClass->runQry($qry) or die($qry."<br/><br/>".mysqli_error($db->connect));
        $rows = mysqli_fetch_array($userResult);
        
        if($rows['role_id']==2) {
            $error= "You are not admin<br>";
        }
        else if ($rows['password']==md5($password)) {
    	    $_SESSION['username']=$name;
            header("location:../view/admindashboard.php");
        }
        else {
    	    $error= "Invalid username or password<br>";
        }
    
    }
   // echo $rows['username'];  
}
include("../view/AdminLoginPage.php"); 
 ob_end_flush();   
?>
