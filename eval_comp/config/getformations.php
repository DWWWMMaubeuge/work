<?php 

include('pdo-connect.php');

if(isset($_SESSION['id']) && $infos['Administrateur'] == TRUE) {

    $listformations = $bdd->query('SELECT * FROM Formations ORDER BY FORMATION');
    
?>
    
    <select id="supprimer" name="supprimer">
        <option value=""></option>
        <?php while($listformation = $listformations->fetch()) { ?>
            <option value="<?= $listformation['ID_FORMATION']; ?>"><?= $listformation['FORMATION']; ?></option>
        <?php } ?>
    </select>
        
<?php } ?>