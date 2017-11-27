<?php

echo "<hr>Reversing string";

$string="poonam";
echo "<br>Input string is ".$string;
$reversed=strrev ($string);
echo "<br>Reversed string is ".$reversed;



echo "<hr>Finding substring";
$a = 'My name is poonam';
echo "<br>string is ==>".$a;
$substring="poonam";
echo "<br>substring is ".$substring;
if (strpos($a, $substring) !== false) {
    echo '<br>string found';
}
else
echo "<br>string not found ";




echo "<hr>Replacing substring";
$newstring="patil";
echo "<br>Before replacment==>".$a;
 echo "<br>After replacment==>".str_replace($substring,$newstring,$a);

?>