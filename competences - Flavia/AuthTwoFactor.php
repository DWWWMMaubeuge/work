<?php

$key1 = random_int ( 1000000000, 10000000000-1 );
$key2 = random_int ( 1000000000, 10000000000-1 );

echo "$key1<br>";
echo "$key2<br>";

for ( $a=0 ; $a < 10 ; $a++ )
{
	$res = ($key1 * $key2);
	$res = $res % (10000-1);  
	echo "$res<br>";
	$key1 = $res;
}
?>
