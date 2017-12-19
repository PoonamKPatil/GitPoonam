<?php
namespace Compassite\Model;

use Compassite\Model\Person;

use Compassite\Model\DBConnection;

class Admin extends Person 
{

    public function disableUser($uid) 
    {
        $disable_users_query = "UPDATE usersInformation set status=".self::INACTIVE." where uid=".$uid."";

        $result = $this->dbObj->pdo->prepare($disable_users_query);

        return $result->execute();
    }

    public function enableUser($uid)
    {
        
        $enable_users_query = "UPDATE usersInformation set status=".self::ACTIVE." where uid=".$uid."";

        $result = $this->dbObj->pdo->prepare($enable_users_query);

        return $result->execute();
    }

    public function deleteUser($uid) 
    {

        $delete_users_query = "DELETE from usersInformation where uid=".$uid."";

        $result = $this->dbObj->pdo->prepare($delete_users_query);

        return $result->execute();
    }

    public function getUsers() 
    {
        $userQry = "select uid,username,email,contact,status from usersInformation where role_id=".self::USERROLEID."";

        $result = $this->dbObj->pdo->prepare($userQry);

        $result->execute();

        return $result->fetchAll();        
    }

}
