<?php
include("DbClass.php");
class Person {
	protected $name;
    protected $password;
    protected $email;
    protected $phoneNumber;
    protected $roleId;
    
    function __construct($name=null,$pwd=null,$email=null,$contact=null,$roleid=null) {
        $this->name=$name;
        $this->email=$email;
        $this->password=$pwd;
        $this->phoneNumber=$contact;
        $this->roleId=$roleid;
    }
    //setter
    function setName($name) {
    	$this->name=$name;
    }
    function setPassword($password) {
    	$this->password=$password;
    }
    function setEmail($email) {
    	$this->email=$email;
    }
    function setPhonenumber($phonenumber) {
    	$this->phoneNumber=$phonenumber;
    }


    //getter
    function  getName() {
    	return $this->name;
    }
    function  getEmail() {
    	return $this->email;
    }
    function  getPassword() {
    	return $this->password;
    }
    function  getPhonenumber() {
    	return $this->phoneNumber;
    }

    public function viewProfile($name) {
    	$dbClass = new DBcontroller();
        $qry2 = "select *from usersInformation where username='".$name."'";
        $result = $dbClass->runQry($qry2);

        $user = mysqli_fetch_array($result);

        $this->name=$user['username'];
        $this->email=$user['email'];
        $this->phoneNumber=$user['contact'];

        
        return $user;


    }
    public function editProfile($uid,$name=null,$email=null,$contact=null) {
        $dbClass = new DBcontroller();
        
        if($name==null && $email!=null && $contact!=null)
        {
            $update_users_query = "UPDATE usersInformation set email='$email' , contact=$contact  where uid=".$uid."";
        }
        else if($email==null && $name!=null && $contact!=null)
        { 
            $update_users_query = "UPDATE usersInformation set username='$name',contact=$contact where uid=".$uid."";
        }
        else if($name==null && $email==null && $contact!=null) 
        {
            $update_users_query = "UPDATE usersInformation set contact=$contact where uid=".$uid."";
        }
        else if($contact==null && $email==null && $name!=null) 
        {
            $update_users_query = "UPDATE usersInformation set username='$name' where uid=".$uid."";
        }
        else if($contact==null && $name==null && $email!=null)
        {

            $update_users_query = "UPDATE usersInformation set email='$email' where uid=".$uid."";
        }
        else 
        {
            $update_users_query = "UPDATE usersInformation set username='$name', email='$email',contact=$contact where uid=".$uid."";
           

        }
    
       
        if($dbClass->runQry($update_users_query))
        {
            return true;

        }
        else
        {
           return false;
        }

    }
    public function insert(Person $person) {
        $dbClass = new DBcontroller();

        $name=$person->name;
        $email=$person->email;
        $pwd=$person->password;
        $contact=$person->phoneNumber;
        $roleid=$person->roleId;

    	$insert_users_query = "INSERT INTO usersInformation (username, password, email,contact,role_id,status)
        VALUES ('$name','$pwd','$email','$contact',$roleid,1)";
        //echo $insert_users_query;
        
        if($dbClass->runQry($insert_users_query))
        {
           return true;

        }
        else
        {
          return false;
        }

    }


}


?>