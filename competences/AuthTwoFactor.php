<?php

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']) )   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
      echo "C<br>";
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      echo "P<br>";
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
      echo "R<br>";
    }
    return $ip;
}

    echo getRealIpAddr(), "<br>";
    echo $_SERVER['HTTP_USER_AGENT'], "<br>";

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