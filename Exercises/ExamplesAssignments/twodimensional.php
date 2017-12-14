<?php

$arr=array(
          array("pen","paper","ink"),
          "poo",
          "100",
          array("apple","banana","papaya")


	);
?>
<pre>
<?php
print_r($arr);

$rows = count($arr);

for ($row = 0; $row < $rows; $row++) {

     $cols = count($arr[$row]);//calculate number of columns for each row
     
     echo "row ".($row+1)." has<br>";
     for($col = 0; $col < $cols; $col++ ) {


         
        if(!is_array($arr[$row]))
        {
        		echo "[".$row."]==>".$arr[$row]."<br>";
        }
        else
        {
        	 echo "[".$row."][".$col."]=>".$arr[$row][$col]."<br>";
        }
              
     }
     echo "<br>"; 
}

?>