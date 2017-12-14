<?php
echo "<h3>Array Slice</h3>";
$input = array("Poonam", "Priya", "Vaishu", "Gayu", "Pree");
echo "Array is<br>";
echo "<pre>";
print_r($input);
echo "<br>Result after array slice";
$output = array_slice($input, 1, 3);   

?>
<pre>
<?php
print_r($output);

echo "<br><h3>Array Sorting</h3>";


$numbers = array(4, 6, 2, 22, 11);

echo "<pre>";
echo "Array is<br>";
print_r($numbers);
sort($numbers);
echo "Sorted array using sort(sorts given array in ascending order)<br>";
foreach ($numbers as $key => $value) {

	echo $value."<br>";
}
echo "...............................................................";


$age = array("Gayu"=>"25", "preeti"=>"34", "vaishu"=>"23");
echo "<pre>";
echo "Array is<br>";
print_r($age);
asort($age);
echo "Sorted array using asort(sorts array based on value)<br>";
foreach ($age as $key => $value) {

	echo $key," ",$value."<br>";
}




?>