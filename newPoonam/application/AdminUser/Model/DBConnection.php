<?php
namespace Compassite\Model;

class DBConnection 
{

    private $host = "localhost";

    private $user = "root";

    private $password = "compass";

    private $database = "loginTest_db";

    public $pdo;
    
    
    public function __construct() 
    {
        try
        {
            $this->pdo = new \PDO("mysql:host=localhost;dbname=loginTest_db",
                "root", "compass");
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch(\PDOException $e){
             $e->getMessage();
        }

    }
  
     public function __destruct()  
    {

         $this->pdo = null;
         
    }
}
