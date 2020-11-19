<?php
	// serverPageAJAX02_getData.php?data1=toto&data2=tata
	$d1 = $_GET[ 'data1' ];
	$d2 = $_GET[ 'data2' ];

	$d1 = strtoupper( $d1 );
	$d2 = strtoupper( $d2 );

	echo "Bonjour $d1<br>Bonjour $d2";
?>