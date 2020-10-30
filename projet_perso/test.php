<?php



/*


function test2(){ 
if (a>10){
  echo "vrai";
} else {
  echo "faux";

}

}
a = 5;
test2();



for ($i =0 ; $i<100; $i ++)
{
  echo $i;
}

$i = 0;
while ($i<10)
{
  echo "coucou";
  $i++;
}

$tab = array("a","b","c");
echo $tab[0];
*/
$people = array("ph"=> 30, "brian"=> 18, "marie"=>25, "jean"=>20);
$people2 = array("alex"=>25,"max"=>40,"balek"=>30);
$people3 = array("jean"=>25,"mich"=>40,"balek"=>30);
//echo $people ["marie"];

/*foreach($people as $elements)
{
  echo $elements."<br>";
  
}
*/
//foreach ($people as $key =>$value){
  //echo "<br> $key a $value";
  //print_r($people);
//}




/*
function afficheTab($peop)
{
  foreach ($peop as $key =>$value)
  {
    echo "$key <br>";
  }
}

function afficheTab2($peop)
{
  foreach ($peop as $key =>$value)
  {
    echo "$value <br>";
  }
}
*/


function afficheTabKey($peop)
{
  foreach ($peop as $key =>$value)
  {
    
    echo "<td>$key </td>";
  }
}

function afficheTabValue($peop)
{
  foreach ($peop as $key =>$value)
  {
    echo "<td>$value</td>";
  }
}



  
  echo "<table>";
  echo "<tr>";
  echo afficheTabKey($people);
  echo "</tr>";
  echo "<tr>";
  echo afficheTabValue($people);
  echo "</tr>";
  echo "</table>";

  echo "<table>";
  echo "<tr>";
  echo afficheTabKey($people2);
  echo "</tr>";
  echo "<tr>";
  echo afficheTabValue($people2);
  echo "</tr>";
  echo "</table>";






//afficheTab($people);
//afficheTab2($people);
//afficheTab($people3);
//afficheTable($people);


//echo afficheTable($people);

?>

<style>
table, td {
  border: 1px solid black;
}
td {
  width: 50px;
  text-align: center;
}

</style>