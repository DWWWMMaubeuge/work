<?php

//setlocale(LC_TIME, "fr_FR");
//setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
//setlocale(LC_ALL, 'fr_FR');
echo time();
echo "<br>";

print_r( getdate() );
echo "<br>";


$time = strtotime("2020-12-25");
echo $time;
echo "<br>";
echo "<br>";

//mktime ( date("H"), date("i"), date("s"), date("n"), date("j"), date("Y") )
$time = mktime(0, 0, 1, 12, 25, 2020);
echo $time;
echo "<br>";
echo date('c', $time);
echo "<br>";
echo date('Y-m-d H:i:s', $time);
echo "<br>";
echo "<br>";


$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
echo date ('l Y-m-d H:i:s', $tomorrow)."<br>";

$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
echo date ('l Y-m-d H:i:s', $lastmonth)."<br>";

$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
echo date ('l Y-m-d H:i:s', $nextyear)."<br>";

// w jour de la semaine


//DateTime Object
//https://www.w3schools.com/php/func_date_date_format.asp
echo "<br>";
$date=date_create("2013-03-15");
print_r( $date );
echo "<br>";
echo date_format($date,"Y/m/d H:i:s")."<br>";



//SQL
//DATE      : stocke une date au format AAAA-MM-JJ (Année-Mois-Jour) ;
//TIME      : stocke un moment au format HH:MM:SS (Heures:Minutes:Secondes) ;
//DATETIME  : stocke la combinaison d'une date et d'un moment de la journée au format AAAA-MM-JJ HH:MM:SS. Ce type de champ est donc plus précis ;
//TIMESTAMP : stocke le nombre de secondes passées depuis le 1er janvier 1970 à 00 h 00 min 00 s ;
//YEAR      : stocke une année, soit au format AA, soit au format AAAA.



?>