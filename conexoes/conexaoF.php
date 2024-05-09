<?php
//Conexão PHP-MySQL
$host = 'localhost'; 
//BD fotos no MySQL
$db   = 'fotos'; 
$user = 'bruno'; 
$pass = '1234'; 
$charset = 'utf8mb4';

//Verificação de erros
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdoFotos = new PDO($dsn, $user, $pass, $opt);

return $pdoFotos;