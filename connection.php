<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";

try {
    $dbh = new PDO("mysql:host=$servername;dbname=sub_service", $username, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>