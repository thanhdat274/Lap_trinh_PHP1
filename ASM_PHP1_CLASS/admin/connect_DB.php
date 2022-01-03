<?php
function getConnection(){
    $dbHost = "mysql:host=localhost;dbname=we16301";
    $dbName = 'root';
    $dbPass ='';
    $connection = new PDO($dbHost, $dbName, $dbPass);
    return $connection;
}
$website = "http://localhost:81/ASM_PHP1_CLASS";
?>