<?php

//Carregar todas as credenciais do banco de bados 
$hostname = "";
$database = "";
$user = "";
$passaword = "";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $passaword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conexão com banco de dados '.$database.', foi realizado com sucesso!';

} catch(PDOException $e){
    echo 'Erro: '.$e->getMessage();
}