<?php
include("parentclass.php");

class Admin extends Person {

    public function disableUser($uid) {
        $dbClass = new DBcontroller();
    	$delete_users_query = "UPDATE usersInformation set status=0 where uid=".$uid."";
    
        if($dbClass->runQry($delete_users_query))
        {
            echo "disabled succesfully";

        }
        else
        {
            echo "error while disbeling data ";
        }

    }
    public function enableUser($uid) {
        $dbClass = new DBcontroller();
        $delete_users_query = "UPDATE usersInformation set status=1 where uid=".$uid."";
    
        if($dbClass->runQry($delete_users_query))
        {
            echo "enabled succesfully";

        }
        else
        {
            echo "error while enabeling data ";
        }

    }
    public function deleteUser($uid) {
        $dbClass = new DBcontroller();
        $delete_users_query = "DELETE from usersInformation where uid=".$uid."";
    
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
    	$qry="select * from usersInformation where role_id=2 and status=1";
        $result=$dbClass->runQry($qry);
        $i=1;
        while($rows = mysqli_fetch_array($result)) {
            echo $i.")".$rows['username']."<br>"."EmailId:-".$rows['email']."<br>"."contact:-".$rows['contact']."<br><br>";
            $i++;
      
        }
    }
    public function getAllUsers() {
        $arr=array();
        $dbClass = new DBcontroller();
        $qry="select username,email,contact from usersInformation where role_id=2";
        $result=$dbClass->runQry($qry);
      
        while($rows = mysqli_fetch_array($result)) {
          $arr[] = array($rows['username'],$rows['email'],$rows['contact']);
        }
        return $arr;
    }
    public function getAllEnabledUsers() {
        $arr=array();
        $dbClass = new DBcontroller();
        $qry="select uid,username,email,contact,status from usersInformation where role_id=2 and status=1";
        $result=$dbClass->runQry($qry);
      
       /* while($rows = mysqli_fetch_array($result)) {
          $arr[] = array($rows['username'],$rows['email'],$rows['contact']);
        }*/
        return $result;
    }
    public function getAllDisableUsers() {
        $arr=array();
        $dbClass = new DBcontroller();
        $qry="select uid,username,email,contact,status from usersInformation where role_id=2 and status=0";
        $result=$dbClass->runQry($qry);
      
        /*while() {
         // $arr[] = array($rows['username'],$rows['email'],$rows['contact']);
        }*/
        return $result;
    }
    public function getUserByname($uname) {

        $dbClass = new DBcontroller();
        $qry="select uid from usersInformation where username='".$uname."'";

        $result=$dbClass->runQry($qry);
      
        while($rows = mysqli_fetch_array($result)) {
          $userid = $rows['uid'];
        }
        echo $rows['uid'];
        return $userid;
    }
     public function getUserByphone($contact) {
        $dbClass = new DBcontroller();
        $qry="select uid from usersInformation where contact='".$contact."'";
        $result=$dbClass->runQry($qry);
      
        while($rows = mysqli_fetch_array($result)) {
          $userid = $rows['uid'];
        }
        return $userid;
    }

     public function checkPassword($password)
    {
        
         $dbClass = new DBcontroller();
         $qry="select password from usersInformation where password='".$password."'";
         
         $result=$dbClass->runQry($qry);
      
         $rows = mysqli_fetch_array($result);
           
         if(!empty($rows['password']))
         {
            
            return true;
         }
         
        return false;
    }
    public function changePassword($uid,$password)
    {
         $dbClass = new DBcontroller();
         $query = "UPDATE usersInformation set password='$password' where uid=".$uid."";
        
         if($result=$dbClass->runQry($query))
         {
            return true;
         }
         
        return false;
    }


}
?>