<?php
include("person.php");

class Admin extends Person 
{
    public function disableUser($uid) 
    {
        $dbClass = new DBcontroller();
    	$disable_users_query = "UPDATE usersInformation set status=".INACTIVE."  where uid=".$uid."";

        if ($dbClass->runQry($disable_users_query)) {
            echo "disabled succesfully";
        } else {
            echo "error while disbeling data ";  
        } 
    }

    public function enableUser($uid)
    {
        $dbClass = new DBcontroller();
        $enable_users_query = "UPDATE usersInformation set status=".ACTIVE." where uid=".$uid."";
    
        if ($dbClass->runQry($enable_users_query)) {
            echo "enabled succesfully";
        }
        else {
            echo "error while enabeling data ";
        }

    }

    public function deleteUser($uid) 
    {
        $dbClass = new DBcontroller();
        $delete_users_query = "DELETE from usersInformation where uid=".$uid."";
    
        if ($dbClass->runQry($delete_users_query)) {
            echo "deleted succesfully";
        } else {
            echo "error while deleting data ";
        }

    }

    public function getUsers() 
    {
        $dbClass = new DBcontroller();
        $userQry="select uid,username,email,contact,status from usersInformation where role_id=".USERROLEID."";
        $result=$dbClass->runQry($userQry);
      
        while ($rows = mysqli_fetch_array($result)) {
            $arr[] = $rows;
        }
        return $arr;
    }

}
?>