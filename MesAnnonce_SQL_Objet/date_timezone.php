<?php

$utc_date = new DateTime();

$nyc_date = $utc_date;
$nyc_date->setTimeZone(new DateTimeZone('America/New_York'));
echo $nyc_date->format('Y-m-d g:i A'); // output: 2011-04-26 10:45 PM


echo "<br>Paris<br>";
$nyc_date->setTimeZone(new DateTimeZone('Europe/Paris'));
echo $nyc_date->format('Y-m-d g:i A'); // output: 2011-04-26 10:45 PM

?>