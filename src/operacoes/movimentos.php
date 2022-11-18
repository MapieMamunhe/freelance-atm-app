<?php

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentos</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/estilos.css" />
</head>
<body>
   <div id="corpo">
    <div class="formulario-login">
    <header>
        <a class="btn bg-dark text-light" href="../menu.html">Voltar</a>
    </header>
        <ul class="text-left pt-2 mt-2">
            <?php
                include_once("bd/consultar.php");
                foreach (listaMovimentos($_SESSION["conta"]) as $value) {
                echo "<li>".$value["movimento"]."</li>";
                }
            ?>
        </ul>
    </div>
    <div class="msg"></div>
   </div>
</body>
</html>