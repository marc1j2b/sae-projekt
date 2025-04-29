<?php

$dsn = 'mysql:dbname=userdb;host=localhost';
$username = 'root';
$password = '';

try {
    $con = new PDO($dsn, $username, $password);
    // Fehler als Ausnahmen behandeln
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Fehler ausgeben (im Produktivsystem besser: Fehler protokollieren und nicht direkt ausgeben)
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

?>
