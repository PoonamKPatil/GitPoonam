<?php
/**
* 
*/

define('s', 10);

class welcomeClass
{
	const a =10;
	public $v =10;
	function __construct()
	{
		# code...
		echo "WC - Constructor get Called";
		echo self::a;
	}
}


class c extends b
{
	function __construct()
	{

	}
}

class b extends welcomeClass
{

	function __construct()
	{
		# code...
		echo "B- Constructor get Called";
		parent::__construct();
echo "<br>";
		echo s;
	} 
}



//$wc = new welcomeClass();
echo "<br>";

//$b =  new b();
//$wc = new welcomeClass();

 echo  "access<br>";

 echo welcomeClass::v;