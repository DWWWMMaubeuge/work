<?php
echo "<html><head><link rel='stylesheet' type='text/css' href='form.css'></head><body>";


 // On vérifie si la variable existe et sinon elle vaut NULL

 $mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
 $password = isset($_POST['password']) ? $_POST['password'] : NULL;
   
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "bdformulaire";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 
 $sql = 'INSERT INTO bdformulaire.users (id, mail,password) 
 VALUES("", "'.$mail.'", "'.$password.'")';
 
 if ($conn->query($sql) === TRUE) {
  
     
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();  

?>
<h1> Login</h1>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<br>
<INPUT type='text' name='mail' placeholder="votre mail">
<br>
<INPUT type='password' name='password' placeholder="votre mot de passe">
<br>
<INPUT type='submit' value='OK'>
</FORM>

<br>


</body>

</html>