<?php
/*$a[]=1;
$a['kiran']=2;
$a[]=3;
$a[4]=4;
$a[]=5;
echo "<pre>";
print_r(array_keys($a));

echo "<pre>";
print_r($a);*/



function inverse($x) {
 if (!$x) {
 throw new Exception('Division by zero.');
 }
 return 1/$x;
}

try {
 //echo inverse(5) . "\n";
 echo inverse(0) . "\n";
} catch (Exception $e) {
 echo 'Caught exception: ', $e->getMessage(), "\n";
 echo "<pre>";
 print_r(get_class_methods($e));
}

?>
