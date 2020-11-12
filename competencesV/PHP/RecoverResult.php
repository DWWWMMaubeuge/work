<?php
include 'SQLRecoverResult.php';

function affTable($array){
    echo "<table class='table table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr >";
    foreach($array as $note){
        echo "<th>".$note['matiere']."</th>";
    }
    echo "</tr>";
    echo "</thead>";
    echo "<tr>";
    foreach($array as $note){
        echo "<td>".$note['eval']."</td>";
    }
    echo "</tr>";
    echo "<tr >";
    foreach($array as $note){
        $arr=explode(' ', $note['date']);

        echo "<td>".$arr[0]."</td>";
    }
    echo "</tr>";
    echo "</table>";
}

affTable($array);

?>

