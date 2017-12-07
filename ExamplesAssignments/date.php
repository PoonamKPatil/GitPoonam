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
<?php

$fromdate=$_GET['dateFrom'];
$todate=$_GET['dateTo'];
echo $fromdate."<br>";
echo $todate."<br>";

$fromyear = date('Y', strtotime($fromdate));

$frommonth = date('n', strtotime($fromdate));

$fromday= date('d', strtotime($fromdate));
$days1= cal_days_in_month(CAL_GREGORIAN, $frommonth, $fromyear);
$p1=abs($days1-$fromday);

$toyear = date('Y', strtotime($todate));

$tomonth = date('m', strtotime($todate));

$today = date('d', strtotime($todate));


$numberofyear=$toyear-$fromyear;
$numberofmonths=abs($tomonth-$frommonth);

echo "<br>number of years ".$numberofyear;

    if($fromyear==$toyear)
	{
	if($frommonth<$tomonth)
	{
       $numberofdays=$p1+$today;
        
        $mon1=$frommonth+1;
        while($mon1<($tomonth-1))
        {
        $numberofdays+=cal_days_in_month(CAL_GREGORIAN, $mon1, $fromyear);
                $mon1++;
        }
 
			echo "<br>number of days ".$numberofdays;
                        
         }
		else if($frommonth==$tomonth)
		{
			$numberofdays=$today-$fromday;
			echo "<br>number of days ".$numberofdays;
		}
		echo "<br>number of months ".$numberofmonths;
		echo "<br>number of weeks ".floor($numberofdays/7);

	}

else if($fromyear<$toyear)
{


          $numberofdays=$p1+$today;
       $mon1=$frommonth+1;
      $i=1;  
       while($mon1<13)
        {
        $numberofdays+=cal_days_in_month(CAL_GREGORIAN, $mon1, $fromyear);
                $mon1++;
        }
        while($i<$tomonth)
        {

            $numberofdays+=cal_days_in_month(CAL_GREGORIAN, $i, $toyear);
        	$i++;
        }
                
echo "<br>number of days ".$numberofdays;

echo "<br>number of weeks ".floor($numberofdays/7);

   $months=0;
        while($frommonth<=12)
           {
            $months++;
		$frommonth++;
        }

      $m1=1;
      while($m1<$tomonth)
        {
              $m1++;
           $months++;

        }



  echo "<br>number of months ".$months;


}









?>
</html>
