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
    	mysqli_select_db($this->connect,"class_db");
    }
    public function runQry($qry) {
       return mysqli_query($this->connect,$qry);
    }
}
?>