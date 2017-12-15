<?php
namespace Compassite\Model;

use Compassite\Model\Person;
use Compassite\Model\DBConnection;

class Admin extends Person 
{
    public function disableUser($uid) 
    {

        $dbObj = new DBConnection();
        $disable_users_query = "UPDATE usersInformation set status=".INACTIVE."  where uid=".$uid."";
        $result = $dbObj->pdo->prepare($disable_users_query);
        return $result->execute();

    }

    public function enableUser($uid)
    {

        $dbObj = new DBConnection();
        $enable_users_query = "UPDATE usersInformation set status=".ACTIVE." where uid=".$uid."";
        $result = $dbObj->pdo->prepare($enable_users_query);
        return $result->execute();

    }

    public function deleteUser($uid) 
    {

        $dbObj = new DBConnection();
        $delete_users_query = "DELETE from usersInformation where uid=".$uid."";
        $result = $dbObj->pdo->prepare($delete_users_query);
        return $result->execute();

    }

    public function getUsers() 
    {

        $dbObj = new DBConnection();
        $userQry ="select uid,username,email,contact,status from usersInformation where role_id=".USERROLEID."";
        $result = $dbObj->pdo->prepare($userQry);
        $result->execute();
        return $result->fetchAll();  
        
    }

}