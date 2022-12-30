<?php
$dbHost = 'Localhost';
$dbUsername = 'root1';
$dbPassword ='root';
$dbName ='registro';
// $conn= new mysqli($dbHost,$dbUsername,$dbPassword, $dbName);
try{
    $conn = new PDO('mysql:host='.$dbHost.';dbname='.$dbName,$dbUsername, $dbPassword);
} catch (PDOException $E){
    $E->getMessage();

}


?>