     <html>
<form name="DateFilter" method="GET">
From:
<input type="date" name="dateFrom" value="" id="dateFrom"/>
<br/>
  <input type="submit" value="submit"/>
</form>
<?php

$fromdate=$_GET['dateFrom'];
echo $fromdate;

$year = date('Y', strtotime($fromdate));
$month = date('F', strtotime($fromdate));

?>
</html>

