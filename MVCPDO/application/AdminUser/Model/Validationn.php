<?php
namespace Compassite\Model;

class Validationn
{
   public $expectedInput = array("name","password","contact","email");
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

              if(in_array($data,$this->expectedInput)){
                       if( isset($this->inputData[$data]) &&  empty($this->inputData[$data]) ){
                           $this->errorMessage[$data] = $data." Required ";                       
                           continue;
                        }
              }
          }
    }
    public function validMobile()
    {
            $contact = $this->expectedInput['contact'];
            if (!preg_match("/^[9|7|8][0-9]{9}$/",$contact)) {
                $this->errorMessage['contact'] = " Inavlid mobile number ";
            }
        
    }

    public function getError()
    {
          return $this->errorMessage;
    }

   
}