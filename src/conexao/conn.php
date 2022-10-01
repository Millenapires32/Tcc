<?php

//Carregar todas as credenciais do banco de bados 
$hostname = "sql213.epizy.com";
$database = "epiz_32544785_ProjetoCed";
$user = "epiz_32544785";
$passaword = "2IGVsO6513";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $passaword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conexão com banco de dados '.$database.', foi realizado com sucesso!';

} catch(PDOException $e){
    echo 'Erro: '.$e->getMessage();
}