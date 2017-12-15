<?php
namespace Compassite\Model;

use Compassite\Model\DBConnection;


class Person 
{
    protected $name;
    protected $password;
    protected $email;
    protected $phoneNumber;
    protected $roleId;
    
    
    function __construct($name=null, $pwd=null, $email=null, $contact=null, $roleid=null) 
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$pwd;
        $this->phoneNumber=$contact;
        $this->roleId=$roleid;
        
    }
    
    //setter
    function setName($name) 
    {
        $this->name=$name;
    }
    function setPassword($password) 
    {
        $this->password=$password;
    }
    function setEmail($email) 
    {
        $this->email=$email;
    }
    function setPhonenumber($phonenumber)
    {
        $this->phoneNumber=$phonenumber;
    }

    //getter
    function  getName() 
    {
        return $this->name;
    }
    function  getEmail() 
    {
        return $this->email;
    }
    function  getPassword() 
    {
        return $this->password;
    }
    function  getPhonenumber() 
    {
        return $this->phoneNumber;
    }

    public function viewProfile($name) 
    {

        $dbObj = new DBConnection();
        $userInfo = "select *from usersInformation where username='".$name."'";
        $result = $dbObj->pdo->prepare($userInfo);
        $result->execute();
        $userInfo = $result->fetchAll();
        foreach ($userInfo as $key => $value) {
           return $value;
        }  

    }

    public function getUserIdByname($uname) 
    {

        $dbObj = new DBConnection();
        $useridQry = "select uid from usersInformation where username='".$uname."'";
        $result = $dbObj->pdo->prepare($useridQry);
        $result->execute();

        $users = $result->fetchAll();
        foreach ($users as $key => $value) {
            $userid = $value['uid'];
        }
        return $userid;

    }
    public function getUserById($uid) 
    {      

        $dbObj = new DBConnection();
        $useridQry = "select * from usersInformation where uid=".$uid."";
        $result = $dbObj->pdo->prepare($useridQry);
        $result->execute();
        $userInfo = $result->fetchAll();
        foreach ($userInfo as $key => $value) {
           return $value;
        }

    }

    public function getUserByName($name) 
    {

        $dbObj = new DBConnection();
        $userqry = "select username,password,role_id,status from usersInformation where username = '".$name."'";

        $userResult = $dbObj->pdo->prepare($userqry);
        $userResult->execute();
        $userInfo = $userResult->fetchAll();
        foreach ($userInfo as $key => $value) {
           return $value;
        }

        
    }

    public function editProfile($uid, $name=null, $email=null, $contact=null) 
    {  

        $dbObj = new DBConnection();
        if($name) {
            $subqry = "username='$name',";
        }
        if ($email) {
            $subqry.="email='$email',";
        }
        if ($contact) {
            $subqry.="contact=$contact";
        }

        $update_users_query = "UPDATE usersInformation set ".$subqry." where uid=".$uid."";
        $editResult = $dbObj->pdo->prepare($update_users_query); 
        return $editResult->execute();

    }
    public function insert(Person $person) 
    {

        $dbObj = new DBConnection();
        $name = $person->name;
        $email = $person->email;
        $pwd = $person->password;
        $contact = $person->phoneNumber;
        $roleid = $person->roleId;

        $insert_users_query = "INSERT INTO usersInformation (username, password, email,contact,role_id,status)
        VALUES ('$name','$pwd','$email','$contact',$roleid,1)";
        
        $insertResult = $dbObj->pdo->prepare($update_users_query); 
        return $insertResult->execute();

    }
    public function checkPassword($password)
    {

        $dbObj  = new DBConnection();
        $infoQry = "select password from usersInformation where password='".$password."'";
        $result = $dbObj->pdo->prepare($infoQry);
        $result->execute();
        $userInfo = $result->fetchAll();

        foreach ($userInfo as $key => $value) {
            if (!empty($value['password'])) {
                return true;
            }
        }
        return false;

    }
    public function changePassword($uid, $password)
    {

        $dbObj = new DBConnection();
        $infoQry = "UPDATE usersInformation set password='$password' where uid=".$uid."";
        
        $changepwdResult=$dbObj->pdo->prepare($infoQry); 
        
        return $changepwdResult->execute();
        
    }


}
