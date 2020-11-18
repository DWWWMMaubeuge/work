<?php
$connect = mysqli_connect("localhost", "root", "", "flavia");
$number = count($_POST["name"]);
if($number > 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";
			mysqli_query($connect, $sql);
		}
	}
	echo "Insértion des données";
}
else
{
	echo "Entre ton nom";
}