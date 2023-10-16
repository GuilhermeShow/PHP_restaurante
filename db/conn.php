<?php

$host = "localhost";
$db = "restaurante";
$user = "root";
$pass = "";
$port = 3306;

try{
    $pdo = new PDO("mysql:host=$host;dbname=". $db, $user, $pass);
    return $pdo;
}catch(PDOException $err) {
    echo "Erro ao conectar ao banco de dados". $err->getMessage();
}