


<?php
echo "***Explode function breaks down string into array***<br><br>";
$str = "Hie, welcome to compassites";
echo "String is ==>".$str;
?>
<pre>
<?php
print_r (explode(" ",$str));


echo "<hr>***implode function joins array elements into string ***<br><br>";


$arr = array('Poonam patil','Navigator','@compassites!');
?>
<pre>
<?php
print_r($arr);
echo "After implode the output string is==>";
echo implode(" ",$arr);

?>