<?php
include("Person.php");
include("DbClass.php");
$dbClass = new DBcontroller();

//inserting to databse
$qry = "INSERT INTO person(person_name,email,phone_number) VALUES('poonam','poonam@gmail.com',9876543219)";
//$dbClass->runQry($qry);


//getting values from database
$qry2 = "select *from person";
$result = $dbClass->runQry($qry2);
/*$persons = mysqli_fetch_array($result) or die(mysqli_error($dbClass->connect));*/
$facultyArray = new ArrayObject();
while($persons = mysqli_fetch_array($result)) {
	
	$facultyObj = new faculty(1,'CS',30000);

    //echo $persons['person_name'];
	$person_id=$persons['person_id'];
    $name=$persons['person_name'];
	$email=$persons['email'];
	$phone_number=$persons['phone_number'];

	$facultyObj->setValues($person_id,$name,$email,$phone_number);
	$facultyArray->append($facultyObj);


}
echo "<pre>";
print_r($facultyArray);



/*$faculty = new Faculty(1,'Computer science',60000);
$faculty->setValues('Karthik','Karthik@gmail.com',9743452673);

$student = new Student(90,'1st sem');
$student->setValues('Poonam','poonam@gmail.com',9743434568);
echo $faculty->getValues();
echo $student->getValues();
*/
?>