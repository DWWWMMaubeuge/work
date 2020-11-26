<?php 

include('pdo-connect.php');

$listformations = $bdd->query('SELECT * FROM Formations ORDER BY FORMATION');

?>

    <select id="deleteformation" name="deleteformation">
        <option value=""></option>
        <?php while($listformation = $listformations->fetch()) { ?>
            <option value="<?= $listformation['ID_FORMATION']; ?>"><?= $listformation['FORMATION']; ?></option>
        <?php } ?>
    </select>