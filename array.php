<?php
function array_union($x, $y)
   { 
      $aunion=  array_merge(
            array_intersect($x, $y),
            array_diff($x, $y),     
            array_diff($y, $x)      
        );
        return $aunion;
   }
$a = array(1, 2, 3, 4);
$b = array(2, 3, 4, 5, 6);
?>
<pre>
<?php
echo "first array is ";
print_r($a);
echo "second array is ";
print_r($b);
echo "union of array 1 and array 2 is";
print_r(array_union($a, $b));
echo "intersection of array 1 and array 2 is";
print_r(array_intersect($a,$b));
echo "array diff between array1 and array2 ";
print_r(array_diff($a, $b));   
echo "array diff between array2 and array1 ";
print_r(array_diff($b, $a));
?>