<?php
namespace Compassite\Model;

class Validation
{

    public $expectedInput = array("name","password","contact","email","confirmpassword");

    public $inputData ;

    public $errorMessage;


    function __construct($inputValue)
    {
        $this->inputData = $inputValue;
        $this->validate();
    }

    public function validate()
    {
        foreach ($this->expectedInput as $key => $data )
        {
            if (in_array($data,$this->expectedInput)) {
                if ( isset($this->inputData[$data]) &&  empty($this->inputData[$data]) ) {
                    $this->errorMessage[$data] = $data." Required ";                       
                    continue;
                }
            }
        }
    }

    public function getError()
    {
          return $this->errorMessage;
    }

    public function validMobile($contact)
    {
        if (!preg_match("/^[9|7|8][0-9]{9}$/",$contact)) {
            return  " Invalid mobile number ";
        }
        
    }

    public function validName($name)
    {
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            return  "Only letter and whitespace allowed";
        }
        
    }

    public function validEmail($email)
    {
        if (!preg_match("/^[a-zA-Z0-9\_\.]*@(gmail|yahoo).com$/",$email)) {
            return  " Invalid EmailId ";
        }
        
    }  
}