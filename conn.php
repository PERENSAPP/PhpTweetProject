<?php
// hier maken we een database connectie aan. Omdat we het bestand conn.php in bijna elke php bestand ophalen door require_once "conn.php"; kunnen we de $conn variabel gebruiken 
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=localhost;dbname=chirpify", $username, $password);
} catch (PDOException $error) {
    echo $error->getMessage();
}
?>