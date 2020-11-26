<?php
require_once( "parametres.php" );
include_once( "CO_global_functions.php"  );

# Liste des questions avec leurs différentes réponses possibles
$liste_question = array(
    'question1' => array(
        'question' => "Quelle est la couleur du cheval blanc ?",
        'reponses' => array('blanc', 'blanche', 'neige', 'clair')
    ),
    'question2' => array(
        'question' => "Combien font deux + dix-huit ?",
        'reponses' => array('20', 'vingt')
    ),
    'question3' => array(
        'question' => "Combien font deux + dix-huit ?",
        'reponses' => array('6', 'vingt')
    ),
    'question4' => array(
        'question' => "Combien font deux + dix-huit ?",
        'reponses' => array('20', 'vingt')
    )
);

session_start();
$_SESSION[ 'ID_user' ]  = 0;

# Sélection d'une question à poser au hasard
$id_question_posee = array_rand($liste_question);
 
# Mémorisation de la question posée à l'utilisateur dans la session
$_SESSION['captcha']['id_question_posee'] = $id_question_posee;

if(     isset($_POST)               && 
        isset($_POST['mail'])       &&       
        isset($_POST['password'])   &&
        ( $_POST['mail'] != ""    ) && 
        ( $_POST['password'] != "") 
  )
{
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];
 
 # On récupère l'identifiant (clé) de la question posée dans la session
$id_question_posee = $_SESSION['captcha']['id_question_posee'];

# On récupère la réponse de l'utlisateur
$reponse_utilisateur = $_POST['captcha_reponse'];
 
# Vérification de la réponse : si la réponse de l'utilisateur n'est pas dans la liste des réponses exactes, on affiche un message d'erreur
if( !in_array($reponse_utilisateur, $liste_question[$id_question_posee]['reponses']) ){
    echo "Vous avez répondu $reponse_utilisateur à la question captcha, ce n'est pas une bonne réponse. Traitement annulé";
    die();
}

    //echo $password;
    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch_assoc();

        $_SESSION[ 'role' ]          = $data[ 'role' ];
        $_SESSION[ 'ID_formation' ]  = $data[ 'id_formation' ];
        $_SESSION[ 'ID_user' ]       = $data[ 'id' ];
        $_SESSION[ 'name' ]          = $data[ 'name' ];
        $_SESSION[ 'surname' ]       = $data[ 'surname' ];
    
        $role = $_SESSION[ 'role' ];
        if ( $role == 'ADM' )
            header( "location: admin.php");
        else if( $role == 'FOR' )
            header( "location: formateur.php");
        else if ( $role == 'STA' )
            header( "location: stagiaire.php");
        else
            header( "location: erreur.php");
    }
    echo "<h3>login incorrect</h3>";
}
?>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='mail' placeholder="votre mail">
<br>
<INPUT type='text' id="PWX" name='password' placeholder="votre mot de passe">
<INPUT type='hidden' id="PWXc" name='passwordc'>
<br>
<br>
Question : <?php echo $liste_question[$id_question_posee]['question']; ?>
<br>
Réponse  : <input type="text" name="captcha_reponse" value="" />
<br>
<INPUT type='submit' value='OK' onclick="encodePW()">
</form>

<style>
	.backG{
		background: red;
	}
</style>