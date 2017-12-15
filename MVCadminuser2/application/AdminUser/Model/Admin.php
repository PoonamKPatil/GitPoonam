<?php
namespace Compassite\Model;

use Compassite\Model\Person;
use Compassite\Model\DBConnection;

class Admin extends Person 
{
    public function disableUser($uid) 
    {
        $dbClass = new DBConnection();
    	$disable_users_query = "UPDATE usersInformation set status=".INACTIVE."  where uid=".$uid."";

        if ($dbClass->runQry($disable_users_query)) {
            return true;
        } else {
            return false;
        } 
    }

    public function enableUser($uid)
    {
        $dbClass = new DBConnection();
        $enable_users_query = "UPDATE usersInformation set status=".ACTIVE." where uid=".$uid."";
    
        if ($dbClass->runQry($enable_users_query)) {
            return true;
        }
        else {
            return false;
        }

    }

    public function deleteUser($uid) 
    {
        $dbClass = new DBConnection();
        $delete_users_query = "DELETE from usersInformation where uid=".$uid."";
    
        if ($dbClass->runQry($delete_users_query)) {
            return true;
        } else {
            return false;
        }

    }

    public function getUsers() 
    {
        $dbClass = new DBConnection();
        $userQry="select uid,username,email,contact,status from usersInformation where role_id=".USERROLEID."";
        $result=$dbClass->runQry($userQry);
      
        while ($rows = mysqli_fetch_array($result)) {
            $arr[] = $rows;
        }
        return $arr;
    }

}
