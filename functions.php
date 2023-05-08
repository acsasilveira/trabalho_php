<?php 
// Conecta com o MySQL usando o PDO
function db_connect()
{
    $user = "acsa";
    $pass = "151205";
    $name = "series_assistidas";
    $host = "localhost";
    
    $PDO = new PDO("mysql:host={$host};dbname={$name}", $user, $pass);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $PDO;
}

?>