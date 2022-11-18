<?php
    session_start();
    $numeroConta=$_GET["conta"];
    $password= $_GET["senha"];
    require_once("operacoes/bd/consultar.php");
    $valido = existeContaSenha($numeroConta,$password);
    if($valido){
      
        $_SESSION["conta"]=$numeroConta;
        header("location:menu.html");
    }else{
        header("location:index.php?msg='Numero da conta ou senha invalida'");
    }
?>