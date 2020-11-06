
/*if (isset($_POST["btn"])) {
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $password   = $_POST['password'];
if(empty( $name ) || empty($surname) || empty($password ) ){
    echo "Please Complet all data";
} else {
    $selectBd = mysqli_query($conn ,"SELECT * FROM skills.users WHERE name = '$name AND surname = $surname AND password = '$password'" );
    $row = mysqli_fetch_array($selectBd);
    if ($row["name"] == $name && $row["surname"] == $surname && $row["password"] == $password){
        executeSQL( $selectBd );
        header( "location: skills.php");
        echo "Welcome".$row["name"]."in your Account";
    }else{
        echo "Incorrect Data";
    }
}
}
/*if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $password   = $_POST['password'];
    // attention aux doublons des mail
    $req = "INSERT INTO skills.users ( name, surname, password ) VALUES ( '$name', '$surname', '$password' )";
    executeSQL( $req );
    header( "location: skills.php");
}
*/
