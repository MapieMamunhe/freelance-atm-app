<?php
$numeroConta=1;
$password=0000;
login($password, $numeroConta);

function login($password, $numeroConta){
    $contaEsperada=1;
    $passwordEsperada=0000;
    if($numeroConta==$contaEsperada && $passwordEsperada==$password){
        return true;
    }
    return false;
}
?>