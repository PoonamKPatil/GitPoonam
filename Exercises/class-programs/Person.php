<?php
abstract class person{
  
   protected $person_id;
   protected $name;
   protected $email;
   protected $phone_number;

   public function setValues($name,$email,$phone_number) {
       $this->name=$name;
       $this->email=$email;
       $this->phone_number=$phone_number;
    
   }
   abstract public function getValues();
}
class Faculty extends Person{

	private $dept_id;
	private $dept_name;
	private $salary;
    
    function __construct($dept_id,$dept_name,$salary) {
    	$this->dept_id=$dept_id;
    	$this->dept_name=$dept_name;
    	$this->salary=$salary;
    }
    public function getValues() {
        return $this->name;
	}	
}

class Student extends Person {
	
	private $marks;
	private $standard;
  
    function __construct($scores,$standard) {
    	$this->marks=$scores;
    	$this->standard=$standard;
    }
	public function getValues() {
	    return $this->name;
	}
}

?>