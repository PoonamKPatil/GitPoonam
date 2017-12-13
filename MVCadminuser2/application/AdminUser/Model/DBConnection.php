<?php
namespace Compassite\Model;

class DBConnection 
{
	private $dbhost;
    private $dbUser;
    private $dbPass;
    private $connect;

    function __construct()
    {
    	$this->dbhost='localhost';
    	$this->dbUser='root';
    	$this->dbPass='compass';
        try {
            $this->connect=mysqli_connect($this->dbhost,$this->dbUser,$this->dbPass);
            mysqli_select_db($this->connect,"loginTest_db");
        } catch(Exception $e) {
            echo $e->getMessage();

        }
    	
    }
    
    public function runQry($qry)
    {
        $result = mysqli_query($this->connect,$qry);

        if (!$result) {
            printf("Error: %s\n", mysqli_error($this->connect));
            exit();
        }
        return $result;
    }
}