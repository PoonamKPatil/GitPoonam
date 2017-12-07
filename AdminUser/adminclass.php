<?php
include("parentclass.php");

class Admin extends Person {

    public function deleteUser($uid) {
        $dbClass = new DBcontroller();
    	$delete_users_query = "DELETE from usersInformation where uid='".$uid."'";
    
        if($dbClass->runQry($delete_users_query))
        {
            echo "deleted succesfully";

        }
        else
        {
            echo "error while deleting data ";
        }

    }
    
    public function listUsers() {
        $dbClass = new DBcontroller();
    	$qry="select * from usersInformation";
        $result=$dbClass->runQry($qry);
        while($rows = mysqli_fetch_array($result)) {
            echo $rows['uid'].")".$rows['username']."<br>"."EmailId:-".$rows['email']."<br><br>";
      
        }
    }
    public function getAllUsers() {
        $arr=array();
        $dbClass = new DBcontroller();
        $qry="select username from usersInformation where role_id=2";
        $result=$dbClass->runQry($qry);
      
        while($rows = mysqli_fetch_array($result)) {
          $arr[] = $rows['username'];
        }
        return $arr;
    }

    public function getUserByname($uname) {
        $dbClass = new DBcontroller();
        $qry="select uid from usersInformation where username='".$uname."'";
        $result=$dbClass->runQry($qry);
      
        while($rows = mysqli_fetch_array($result)) {
          $userid = $rows['uid'];
        }
        return $userid;
    }

}
?>