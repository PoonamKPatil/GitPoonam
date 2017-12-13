<?php

class DBcontroller 
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
    	$this->connect=mysqli_connect($this->dbhost,$this->dbUser,$this->dbPass);
    	mysqli_select_db($this->connect,"loginTest_db");
    }
    
    public function runQry($qry)
    {
       return  mysqli_query($this->connect,$qry) or die(mysqli_error($this->connect));
    }
}
?>