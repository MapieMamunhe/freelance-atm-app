<?php

function conectarBD(){
    $servidor = "localhost";
    $user = "root";
    $pwd = "";
    $bd = "atm_barclays";
    $dsn = "mysql:host=$servidor;dbname=$bd";
    try{
        $pdo =  new PDO($dsn,$user,$pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(PDOException $e){
        echo ("Falha na conexao ".$e->getMessage());
    }
}