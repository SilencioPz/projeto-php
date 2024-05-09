<?php
//Conexão PHP-MySQL
$host = 'localhost'; 
//BD logando no MySQL
$db   = 'logando'; 
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
$pdo = new PDO($dsn, $user, $pass, $opt);