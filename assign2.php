<html>
<form name="DateFilter" method="GET">
From:
<input type="date" name="dateFrom" value="" id="dateFrom"/>
<br/>

To:
<input type="date" name="dateTo" value="" id="dateTo"/>
<br/>
  <input type="submit" value="submit"/>
</form>
</html>
<?php

$fromDate=$_GET['dateFrom'];
$toDate=$_GET['dateTo'];
echo $fromDate."<br>";
echo $toDate."<br>";

$fromYear = date('Y', strtotime($fromDate));
$fromMonth = date('n', strtotime($fromDate));
$fromDay= date('d', strtotime($fromDate));

$days= cal_days_in_month(CAL_GREGORIAN, $fromMonth, $fromYear);
$difference=abs($days-$fromDay);

$toYear = date('Y', strtotime($toDate));
$toMonth = date('m', strtotime($toDate));
$toDay = date('d', strtotime($toDate));


$numberOfYears=$toYear-$fromYear;
$numberOfMonths=abs($toMonth-$fromMonth);

echo "<br>number of years ".$numberOfYears;
// Check Year Equal
if($fromYear == $toYear) {
    if($fromMonth<$toMonth) {
        // add days 
        $numberOfDays=$difference+$today;
        $mon1=$fromMonth+1;
        // Increment till month end
        while($mon1<($toMonth-1)) {
            $numberOfDays+=cal_days_in_month(CAL_GREGORIAN, $mon1, $fromYear);
            $mon1++;
        }
        echo "<br>number of days ".$numberOfDays;
    } else if($fromMonth==$toMonth) {
        $numberOfDays=$today-$fromDay;
        echo "<br>number of days ".$numberOfDays;
    }
    echo "<br>number of months ".$numberOfMonths;
    echo "<br>number of weeks ".floor($numberOfDays/7);

}

if($fromYear < $toYear) {
    $numberOfDays=$difference+$today;
    $mon1=$fromMonth+1;
    $i=1;
    while($mon1<13) {
        $numberOfDays+=cal_days_in_month(CAL_GREGORIAN, $mon1, $fromYear);
        $mon1++;
    }
    while($i<$toMonth) {
        $numberOfDays+=cal_days_in_month(CAL_GREGORIAN, $i, $toYear);
        $i++;
    }

echo "<br>number of days ".$numberOfDays;
echo "<br>number of weeks ".floor($numberOfDays/7);

    $months=0;
    while($frommonth<=12) {
        $months++;
        $frommonth++;
    }
    $m1=1;
    while($m1<$toMonth) {
        $m1++;
        $months++;

   }
 echo "<br>number of months ".$months;

}

if($fromYear==$toYear) {
    $i=$fromMonth;
    while($i<=$toMonth) {
        getStartDateOfMonth($i, $fromYear);
        $i++;
   }
}

if($fromYear<$toYear) {
   $i=$fromMonth;
   while($i<13) {
       getStartDateOfMonth($i, $toYear);
       $i++;
   }

   $i=1;
   while($i<=$toMonth) {
       getStartDateOfMonth($i, $toYear);
       $i++;
   }
}
   
    function getStartDateOfMonth($month, $year)
    {
      $day= date('w', mktime(0,0,0,$month,1,  $year));
      echo "<br>1st  ".date('F', mktime(0,0,0, $month, 1, $year))." =>".findday($day);
    }

  
   function findday($day)
   {
       switch($day)
       {
           case 1: $d="monday"; break;
           case 2: $d="tuesday"; break;
           case 3: $d="wednesday"; break;
           case 4: $d="thursday"; break;
           case 5: $d="friday"; break;
           case 6: $d="saturday"; break;
           case 0: $d="sunday"; break;
        }
   return $d;
  }

?>
