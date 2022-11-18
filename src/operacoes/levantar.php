<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levantar</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/estilos.css" />
</head>
<body>
    <div id="corpo">
        <form class="formulario-login" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <header>
                <a  class="mb-3 btn bg-dark text-light" href="../menu.html">Voltar</a>
            </header>
        <p>
            <label for="">Valor</label>
            <input type="number" name="valor" min="10">
        </p>
        <p>
            <input type="submit" class="btn " name="submit" value="Levantar">
        </p>
    </form>
    <div class="msg"></div>
    </div>
</body>
</html>

<?php
    if(isset($_POST["submit"])){
        $taxa = 10;
        $valor = $_POST["valor"] + $taxa;
        include_once("bd/consultar.php");
        $saldo = saldo($_SESSION["conta"]);
        if($valor>$saldo){
            echo "<script>alert('Saldo Insuficiente');</script>";
        }else{
            $saldoNovo = $saldo-$valor;
            include_once("bd/actualizar.php");
            setSaldo($_SESSION["conta"], $saldoNovo);
            include_once("bd/inserir.php");
            setMovimento($_SESSION["conta"], "Levantamento de ".$_POST['valor']." MZN");
            echo "<script>alert('Retire suas notas');
                window.location.href='../menu.html';
            </script>";
        }
    }
?>