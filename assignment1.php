<html>
<form action="" method="get">
Enter Year:<input type="text" name="year" id="year" placeholder="Year" required>
</form>
<?php

$months=12;

$year=$_GET['year'];
// Check for Leap Year
// REDO LATER
if(($year%400) == 0 && ($year%4)==0)
{


	echo $year." is leap year<br>";

	echo "<br>Number of months ".$months;
       
$m=1;
$c1=0;
$c2=0;
$c3=0;
$c=0;
$numberofweeks=0; 
$numberofdays=0;
while($m!=13)
{
     $noMonthdays = cal_days_in_month(CAL_GREGORIAN, $m, $year); // 31

	$numberofdays+=$number;

       $numberofweeks=($numberofdays)/7; 

$m++;

if($number==31)
{
		$c1++;
}
else if($number==30)
{
	$c2++;

}
else if($number==28)
{
$c3++;
}
else
{
$c++;
}


}
   echo "<br>Number of months which has 31 days ".$c1;
echo "<br>Number of months which has 30 days ".$c2;
   echo "<br>Number of days ".$numberofdays."<br>";
  echo "Number of weeks ".$numberofweeks;
 
$number = cal_days_in_month(CAL_GREGORIAN, 2, $year); // 31


echo "<br>February has ".$number."   days in ".$year."<br>";
}
else
{
  $days=366;
$weeks=53;

   echo $year." is not leap year<br>";

		echo "<br>Number of months ".$months;


$m=1;
$c1=0;
$c2=0;
$c3=0;
$c=0;
  $numberofweeks=0;
$numberofdays=0;


while($m!=13)
{
     $number = cal_days_in_month(CAL_GREGORIAN, $m, $year); // 31
	 $numberofdays+=$number;

       $numberofweeks=($numberofdays)/7;

$m++;

if($number==31)
{
                $c1++;
}
else if($number==30)
{
        $c2++;

}
else if($number==28)
{
$c3++;
}
else
{
$c++;
}


}
   echo "<br>Number of months which has 31 days ".$c1;
echo "<br>Number of months which has 30 days ".$c2;
	echo "<br>Number of days ".$numberofdays."<br>";
  echo "Number of weeks ".$numberofweeks;

$number = cal_days_in_month(CAL_GREGORIAN, 2, $year); // 31


echo "<br>February has ".$number."   days in ".$year."<br>";






}


?>
