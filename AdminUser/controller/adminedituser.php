<?php
    session_start();
    ob_start();
?>
<?php
include("../Model/userClass.php");
include("../Model/validation.php");

if(isset($_SESSION['username'])) {
  include("../view/admindashboard.php");
  $uid=$_GET['userid'];
  //echo "hiiiiiiiiiiiii";
 // echo $uid;
  $userobj = new Person();
  $userarr=$userobj->getUserByid($uid);

$user = mysqli_fetch_array($userarr)?>

<?php echo "<br><br>";
$usr=new User();
//echo $uid;
if(isset($_POST['submit']) && empty($nameErr) && empty($emailErr) && empty($conatctErr)) {
   if($usr->editProfile($uid,$_POST['name'],$_POST['email'],$_POST['contact']))
   {
   	 header("location:updateuser.php");
   }

}
 include("../view/adminedituserform.php");
}
else {
    header("location:adminLogin.php");
}
ob_end_flush();
?>
