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
    protected $db;
    
    function __construct($name=null, $pwd=null, $email=null, $contact=null, $roleid=null) 
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$pwd;
        $this->phoneNumber=$contact;
        $this->roleId=$roleid;

        $this->db =  new DBConnection();
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

        $qry2 = "select *from usersInformation where username='".$name."'";
        $result = $this->db->runQry($qry2);
        $user = mysqli_fetch_array($result);

        $this->name=$user['username'];
        $this->email=$user['email'];
        $this->phoneNumber=$user['contact'];
        
        return $user;
    }

    public function getUserIdByname($uname) 
    {
        $useridQry="select uid from usersInformation where username='".$uname."'";
        $result=$this->db->runQry($useridQry);
      
        while ($rows = mysqli_fetch_array($result)) {
            $userid = $rows['uid'];
        }
       
        return $userid;
    }
    public function getUserById($uid) 
    {      
        $useridQry="select * from usersInformation where uid=".$uid."";
        $result=$this->db->runQry($useridQry);
 
        return mysqli_fetch_array($result);
    }

    public function getUserByName($name) 
    {
        $userqry="select username,password,role_id,status from usersInformation where username = '".$name."'";

        $userResult = $this->db->runQry($userqry);
        if($userResult) {
            $rows = mysqli_fetch_array($userResult);
            return $rows;
        }
        return false;
    }

    public function editProfile($uid, $name=null, $email=null, $contact=null) 
    {  
        
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

        if ($this->db->runQry($update_users_query)) { 
            return true;
        }      
        return false;
    }
    public function insert(Person $person) 
    {

        $name = $person->name;
        $email = $person->email;
        $pwd = $person->password;
        $contact = $person->phoneNumber;
        $roleid = $person->roleId;

    	$insert_users_query = "INSERT INTO usersInformation (username, password, email,contact,role_id,status)
        VALUES ('$name','$pwd','$email','$contact',$roleid,1)";
        
        if ($this->db->runQry($insert_users_query)) {
           return true;
        }
        return false;
    }
    public function checkPassword($password)
    {
        $infoQry = "select password from usersInformation where password='".$password."'";
        $result = $this->db->runQry($infoQry);
        $rows = mysqli_fetch_array($result);
  
        if (!empty($rows['password'])) {
            return true;
        }
        return false;
    }
    public function changePassword($uid, $password)
    {
        $infoQry = "UPDATE usersInformation set password='$password' where uid=".$uid."";
        
        if ($result=$this->db->runQry($infoQry)) {
            return true;
        }
        return false;
    }


}
