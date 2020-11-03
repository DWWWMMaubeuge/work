<?php
$servername = "10.115.49.73";
$username  = "fouad";
$password    = "fouad";
$dbname      ="fouad";

try {
                    $conn = new PDO("mysql:host=$servername;dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "Connected successfully";
                    echo "<br>";   
                    } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
            }