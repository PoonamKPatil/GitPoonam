<?php
include("person.php");
class User extends Person {

	public function getUserByname($uname) {
        $dbClass = new DBcontroller();
        $qry="select uid from usersInformation where username='".$uname."'";
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