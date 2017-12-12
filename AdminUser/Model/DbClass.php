<?php
class DBcontroller {

	public $dbhost;
    public $dbuser;
    public $dbpass;
    public $connect;

    function __construct() {
    	$this->dbhost='localhost';
    	$this->dbuser='root';
    	$this->dbpass='compass';
    	$this->connect=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass);
    	mysqli_select_db($this->connect,"loginTest_db");
    }
    
    public function runQry($qry) {
       $result=mysqli_query($this->connect,$qry) or die(mysqli_error($this->connect));
       return $result;
    }
}
?>