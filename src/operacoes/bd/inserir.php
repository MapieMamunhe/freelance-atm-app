<?php

function setMovimento($conta, $operacao){
    $consulta = conectarBD()->prepare("insert into movimento (numero_conta, movimento) values (:numero, :operacao)");
    $parametros = [":numero"=>$conta, ":operacao"=>$operacao];
    $consulta->execute($parametros);
}