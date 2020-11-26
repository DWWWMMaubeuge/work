<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

                                            
if(   isset($_POST['list_stagiaire2session']		)  && 
		   ($_POST['list_stagiaire2session'] != "" 	)  && 
	  isset($_POST['selSession']					)  &&
	 	   ($_POST['selSession'] > 0				) 
  ) 
{
    $list_stagiaire = $_POST['list_stagiaire2session'];
    $ID_session    	= $_POST['selSession'];

	$mails = parseMailIntoText( $list_stagiaire );
	foreach ($mails as $mail) 
	{
		$ID_NewUser = addUser( $mail, 'STA');
		$req = "UPDATE $DB_dbname.users SET id_session=$ID_session, role='STA' WHERE mail='$mail'";
		executeSQL( $req );

		// to fix : set id_formation 

		$req = "INSERT INTO $DB_dbname.user_session ( id_user, id_session ) VALUES ( $ID_NewUser, $ID_session )";
		executeSQL( $req );
	}
}

header( "location: admin.php");

?>
