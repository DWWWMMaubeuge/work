<?php
include_once 'idBDD.php';

$query=$bdd->prepare("SELECT u.id,u.name,u.firstname,u.id_form,f.name as form,u.adminRight FROM users as u INNER JOIN formation as f ON f.id=u.id_form ORDER BY u.id_form");
$query->execute();
$users=$query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($users);


function formSuperUser($users){
    echo "<div class='form-group'>";
    echo "<label for='addFormation'>Ajouter ici une formation</label>";
    echo "<input type='text' class='form-control' id='addFormation' placeholder='Entrez une formation à intégrer'>";
    echo "<input type='submit'  id='submitFormation' class='btn btn-primary mt-2' value='Validez' >";
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
    echo "<input type='submit' id='submitAdminRight' class='btn btn-primary' value='Validez'>";
    echo "<div id='msg2'></div>";
}
//formSuperUser($users);
?>