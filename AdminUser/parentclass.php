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

        echo "Your name:".$this->name."<br>";
        echo "Your Email Id:".$this->email."<br>";
        echo "Your phone number:".$this->phoneNumber."<br>";

    }
    public function editProfile($uid=null,$name=null,$email=null,$contact=null) {
        $dbClass = new DBcontroller();

        if(empty($name))
        {
             $update_users_query = "UPDATE usersInformation set email='".$email."' , contact=".$contact." where uid='".$uid."'";
        }
        else if(empty($email))
        {
            $update_users_query = "UPDATE usersInformation set username='".$name."' , contact=".$contact."'where uid='".$uid."'";
        }
        else if(empty($name) && empty($email)) {
            $update_users_query = "UPDATE usersInformation set contact='".$contact."' where uid='".$uid."'";
        }
        else if(empty($contact) && empty($email)) {
            $update_users_query = "UPDATE usersInformation set username='".$name."' where uid='".$uid."'";
        }
        else if(empty($contact) && empty($name)) {
            $update_users_query = "UPDATE usersInformation set email='".$email."' where uid='".$uid."'";
        }
       
        if($dbClass->runQry($update_users_query))
        {
            echo "succesfully updated";

        }
        else
        {
           echo "error while updating data ";
        }

    }
    public function insert(Person $person) {
        $dbClass = new DBcontroller();

        $name=$person->name;
        $email=$person->email;
        $pwd=$person->password;
        $contact=$person->phoneNumber;
        $roleid=$person->roleId;

    	$insert_users_query = "INSERT INTO usersInformation (username, password, email,contact,role_id)
        VALUES ('$name','$pwd','$email','$contact',$roleid)";
        //echo $insert_users_query;
        
        if($dbClass->runQry($insert_users_query))
        {
            echo "succesfully inserted";

        }
        else
        {
           echo "error while inserting data ";
        }

    }


}


?>