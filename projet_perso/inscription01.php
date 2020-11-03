<?php

function executeSQL( $req )
{
	GLOBAL $DB_URL, $DB_user, $DB_PW;

	$result = false;
	if ( $req != "" )
	{

		//echo "new mysqli($DB_URL, $DB_user, $DB_PW);<br>";
		// Create connection
		$conn = new mysqli('localhost','root','');

		// Check connection
		if ($conn->connect_error) 
		{
		  die("Connection failed: " . $conn->connect_error);
		}


		echo $req."<br>";
		$result = $conn->query( $req );
		if ($conn->error) 
		{
		  die("erreur insert: " . $conn->error);
		}

		$conn->close();
	}
	return $result;
}


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "INSERT INTO utilisateur.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location:accueil.php");
}

?>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='name' placeholder="votre nom ici">
<br>
<INPUT type='text' name='surname' placeholder="votre prenom">
<br>
<INPUT type='text' name='mail' placeholder="votre mail">
<br>
<INPUT type='text' name='password' placeholder="votre mot de passe">
<br>
<INPUT type='submit' value='OK'>
</FORM>