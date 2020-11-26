<?php 

if(isset($_SESSION['id']) && $infos['Admin'] != TRUE && $infos['SuperAdmin'] != TRUE) {

    function setWidgetValue( $skill ) {
        
        GLOBAL $formation;
        GLOBAL $infos;
        
        
        /* Si la compétence n'a pas encore été évalué, alors la valeur de notre input sera égale à zéro.
        Sinon elle sera égale à son résultat */
        if(is_null($skill[2])) {
            
            $value = 0;
            
        } else {
            
            $value = $skill[2];
            
        }
        
        // Création des inputs selon les valeurs de skill ainsi que de la valeur de la variable value. Pour plus de détails sur $skill, se reporter à la documentation de la page auto-evaluation.php
        $widget = "<p>".$skill[1]."</p><input type='range'  value='" . $value ."' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", " . $infos['ID_FORMATION'] . ", this.value, " . $infos['SESSION'] . ", " . $_SESSION['id'] . " )\" >";
        return $widget;
    
    }
    
    function setAllWidgetValue( $skills ) {
        
        // Création d'une div .row qui servira de container à nos inputs
        $widget =  "<div class='row'>";
        
        foreach( $skills as $skill ) {
            
            $widget .=  "<div class='col-4 mb-5'>"; // Division du container en 3 colonne boostrap. chaque colonne contiendra un input
            $widget .= setWidgetValue( $skill ); // On récupére notre input créé en haut et on l'affiche dans la div bootstrap
            $widget .= "</div>";
            
        }
        
        $widget .= "</div>"; // On ferme notre container une fois que la boucle foreach est terminée.
        return $widget;
    
    }
    
}

?>