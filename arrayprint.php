<?php

$arrsingle=array("1"=>"poonam","2"=>"pooja","3"=>"pallavi","4"=>"preeti");


$arrmulti=array(
          array("pen","paper","ink"),
          array("apple","banana","papaya")
	);

echo "...Single dimensional....";
echo "<table border=1px>";
echo "<tr><td>Key</td>";
echo "<td>Value</td></tr>";
foreach ($arrsingle as $key => $value) {

    echo "<tr>";
	echo "<td>".$key."</td>";
	echo "<td>".$value."</td>";
	echo "</tr>";
}
echo "</table><br><br>";



echo "...Multi dimensional....";
echo "<table border=1px>";
echo "<tr><td>Key</td>";
echo "<td>Value</td></tr>";

     foreach($arrmulti as $a1) {
                echo "<tr>";
                        foreach ($a1 as $item=>$value) {
                        
                            echo "<td>".$item."</td>";
                            echo "<td>".$value."</td>";

                             echo "</tr>";
                        }
                     
                      echo "<br >";
                    }      
                  
                    

echo "</table>";

?>