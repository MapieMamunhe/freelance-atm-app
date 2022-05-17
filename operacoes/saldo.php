<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/estilos.css" />

</head>
<body>
    <div id="corpo">
        <div class="formulario-login">
        <header>
            <a  class="mb-2 btn bg-dark text-light" href="../menu.html">Voltar</a>
        </header>
    <h2>
        Saldo: <?php
            include_once("bd/consultar.php");
            echo saldo($_SESSION["conta"]);
        ?> MZN
    </h2>
        </div>
        <div class="msg"></div>
    </div>
</body>
</html>