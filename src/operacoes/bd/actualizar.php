<?php

function setSaldo($conta, $saldo){
    $consulta = conectarBD()->prepare("update conta set conta_saldo =:saldo where conta_numero=:numero");
    $parametros = [":numero"=>$conta, ":saldo"=>$saldo];
    $consulta->execute($parametros);
}