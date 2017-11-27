<?php

echo "<pre>";
$str=" Child labour comes in many forms.
 It can be visible or invisible. Many children work at dump sites, cut stones, work in small 
 factories, car workshops or as a carrier in ports or on construction sites. 
 Parents also sent their out to go begging on the streets. 
 Others work as prostitutes or domestic slaves. 
 Terre des Hommes uses the definition of child labour stated in Convention 182 of the International 
 Labour Organization (ILO) about the worst forms of child labour: <br>";

echo $str;

$count=substr_count($str, "in");

echo "<br><h4>\"in\" is appreared ".$count." many times<hr4>";





?>