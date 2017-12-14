<?php
class DBConnection 
{
	private $host = "localhost";
	private $user = "root";
	private $password = "compass";
	private $database = "loginTest_db";
	private $conn;
	public $pdo;
	
	public function __construct() 
	{
		$host = "localhost";
		$database = "loginTest_db";
		$user = "root";
		$password = "compass";
		
		

		 try
        {
            $this->pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //secho 'Successfully connected to the database!';
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }

    }
     public function __destruct()
    {
        // Disconnect from DB
        $this->pdo = null;
        //echo 'Successfully disconnected from the database!';
    }
	
	
	
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
					return $result;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}

public function addUser($user)
{
	$firstname=$user->getFirstName();
	$lastname=$user->getLastName();
	$password=md5($user->getPassword());
	$email=$user->getEmail();
	$qualification=$user->getQualification();
	$city=$user->getCity();
	$state=$user->getState();
   

   $sth = $this->pdo->prepare('INSERT INTO user(firstname,lastname,password,email,qualification,city,state,status) VALUES(:firstname,
   	:lastname,:password,:email,:qualification,:city,:state,:0)');

   $sth->bindParam(':firstname', $firstname);
   $sth->bindParam(':lastname', $lastname);
   $sth->bindParam(':password', $password);
   $sth->bindParam(':email', $email);
   $sth->bindParam(':qualification', $qualification);
   $sth->bindParam(':city', $city);
   $sth->bindParam(':state', $state);
   $sth->bindParam(':0', $status);


   $sth->execute();
   


}

}
?>