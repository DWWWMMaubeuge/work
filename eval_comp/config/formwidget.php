<?php 

$userformation = $bdd->prepare('SELECT * FROM Options LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Options.ID = :user');
$userformation->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
$userformation->execute();

$formation = $userformation->fetch();

function setWidgetValue( $skill ) {
    
    GLOBAL $formation;
    
    if(is_null($skill[2])) {
        $value = 0;
    } else {
        $value = $skill[2];
    }

    $widget = "<p>".$skill[1]."</p><input type='range'  value='" . $value ."' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", " . $formation['ID_FORMATION'] . ", this.value, " . $formation['SESSION'] . ", " . $_SESSION['id'] . " )\" >";
    return $widget;

}

function setAllWidgetValue( $skills  ) {
    
    $compteur = 1;
    foreach( $skills as $skill ) {
        if($compteur == 1) {
            $widget =  "<div class='row'>";
        }
        $widget .=  "<div class='col-4 mb-5'>";
        $widget .= setWidgetValue( $skill );
        $widget .= "</div>";
        $compteur++;
    }
    $widget .= "</div>";
    return $widget;

}

?>