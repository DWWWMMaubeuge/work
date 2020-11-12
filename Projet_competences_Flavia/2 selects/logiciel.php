<?php
require_once("database_connect.php");
$db = new DB();
if(!empty($_POST["idformations"])) {
	$query ="SELECT * FROM flavia.logiciels WHERE idformations = '" . $_POST["idformations"] . "'";
	$results = $db->runQuery($query);
?>
	<option value="">Sélectionnez le logiciel</option>
<?php
	foreach($results as $logiciels) {
?>
	<option value="<?php echo $logiciels["id"]; ?>"><?php echo $logiciels["titre"]; ?></option>
<?php
	}
}
?>