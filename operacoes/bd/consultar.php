<?php

require_once("connect.php");
//Senha padrao é 1000 para o user 1
function existeContaSenha($conta, $senha){
    
    $consulta = conectarBD()->prepare("select conta_senha from conta where conta_numero=:numero");
    $parametros = [":numero"=>$conta];
    $consulta->execute($parametros);
    $hash = $consulta->fetch(PDO::FETCH_OBJ)->conta_senha;
    if(is_null($hash)){
        return false;
    }
    if(password_verify($senha, $hash)){
        return true;
    }
    return false;
}

function saldo($conta){
    
    $consulta = conectarBD()->prepare("select conta_saldo from conta where conta_numero=:numero");
    $parametros = [":numero"=>$conta];
    $consulta->execute($parametros);
    return $consulta->fetch(PDO::FETCH_OBJ)->conta_saldo;
}
function listaMovimentos($conta){
    
    $consulta = conectarBD()->prepare("select movimento from movimento where numero_conta=:numero");
    $parametros = [":numero"=>$conta];
    $consulta->execute($parametros);
    return $consulta->fetchAll(PDO::FETCH_ASSOC);

}