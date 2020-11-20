<?php
include_once 'idBDD.php';
include_once 'fonctionAffichages.php';

$query=$bdd->prepare("SELECT u.id,u.name,u.firstname,u.id_form,f.name as form,u.adminRight FROM users as u INNER JOIN formation as f ON f.id=u.id_form ORDER BY u.id_form");
$query->execute();
$users=$query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($users);


function formSuperUser($users,$formation){
    echo "<div class='form-group'>";
    echo "<label for='addFormation'>Ajouter ici une formation</label>";
    echo "<input type='text' class='form-control' id='addFormation' placeholder='Entrez une formation à intégrer'>";
    echo "<input type='submit'  id='submitFormation' class='btn btn-primary mt-2' value='Valider' >";
    echo "<div id='msg1'></div>";
    echo '</div>';
    echo "<div class='form-group'>";
    echo "<label for='userList'>Choisissez le membre auquel attribuez ou retirez les droits de formateur</label>";
    echo "<select class='form-control' name='userList' id='userList'>";
    echo "<option value=''>--Choisissez un membre--</option>";
    foreach ($users as $user){
        echo "<option value='".$user['id']."'>".$user['name']." ".$user['firstname']." ".$user['form']."</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "<div class='form-check form-check-inline'>";
    echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='1'>";
    echo "<label class='form-check-label' for='inlineRadio1'>Admin</label>";
    echo "</div>";
    echo "<div class='form-check form-check-inline'>";
    echo "<input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='0'>";
    echo "<label class='form-check-label' for='inlineRadio2'>Pas admin</label>";
    echo "</div>";
    echo "<input type='submit' id='submitAdminRight' class='btn btn-primary' value='Valider'>";
    echo "<div id='msg2'></div>";
    echo "<form method='post' >";
    echo "<div class='form-group mt-2'>";
    echo "<label for='bulk'>Entrez l'email des personnes à inscrire ci-dessous</label>";
    echo "<textarea class='form-control' id='bulk' name='bulk' cols='30' rows='10' placeholder='Entrez les emails...'></textarea>";
    selectForm($formation);
    echo "<input type='submit' id='submitBulk' name='submitBulk' class='btn btn-primary mt-1' value='Envoyer'>";
    echo "</div>";
    echo "</form>";
}

//formSuperUser($users);
?>