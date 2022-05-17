<?php
    session_start();
    include_once("bd/consultar.php");
    $saldo = saldo($_SESSION["conta"]);
    $idCompra =$_GET["id"];
    $arrayCompra =array(
        array(
            "Credelec"=>"Numero de contador"), 
        array(
            "Recarga"=>("Numero de telefone")
        )
    ); 
    $tiposCompra = $arrayCompra[$idCompra];

    $chavesCompra = array_keys($tiposCompra); //crelec vs recarga

    $compra = $tiposCompra[$chavesCompra[0]]; //contador vs telefone 
    //0-Compra de credelec
    //1- Compra de credito
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar <?=$chavesCompra[0];?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/estilos.css" />

</head>
<body>
   
        <div id="corpo">
            <form class="formulario-login" action="<?=$_SERVER["PHP_SELF"] ?>" method="post">
                <header class="mb-4">
                    <a  class="btn bg-dark text-light" href="../menu.html">Voltar</a>
                </header>
                <p>
                    <label for="" style="display: block;"><?=$compra;?></label>
                    <?php 
                        if($chavesCompra[0]=="Credelec"){
                            echo '<input type="number" name="contador" id="" >';
                        }else{
                            echo '<input type="tel" name="telefone" pattern="[8]{1}[2-7]{1}-[0-9]{7}" placeholder="82-0000000"  id="" >';
                        }
                    ?>
                </p>
                    
                <p>
                    <label for="" style="display: block;">Valor</label>
                    <input type="number" name="valor" id="valor" min="10" value="10">
                </p>

                <p><input type="submit" name="submit" class="btn btn-confirm" value="Comprar"></p>
            </form>
            <div class="msg"></div>      
        </div>
   
</body>
</html>
<?php

    if(isset($_POST["submit"])){
        $taxa=10;
        $valorCompra = $_POST["valor"];
        if($valorCompra+$taxa>$saldo){
            info("Saldo Insuficiente");
        }

       $saldoActual = $saldo-$valorCompra-$taxa;
       require_once("bd/actualizar.php");
       require_once("bd/inserir.php"); 
       setSaldo($_SESSION["conta"], $saldoActual);

        if(isset($_POST["contador"])){
            $numero = $_POST["contador"];
            $msg ="Contador: $numero, Valor: $valorCompra";
            info($msg." RETIRE O SEU RECIBO");
            setMovimento($_SESSION["conta"], $msg);
        }else{
            $numero = $_POST["telefone"];
            $operadora = explode("-", $numero)[0];
            switch($operadora){
                case "82":case "83":
                    $operadora="T-Mcel";
                    break;
                    case "84":case "85":
                        $operadora="Vodacom";
                        break;
                        case "86": case"87":
                            $operadora= "Movitel";
                            break;
                            default:
                            info("Numero invalido... Tente novamente");
                            break;
                            
            }
            $msg="Recarga da $operadora, Valor: $valorCompra para o numero $numero ";
            info($msg);
            setMovimento($_SESSION["conta"], $msg);
        }
    }
    function info($mensagem){
        echo "<script>
        alert('$mensagem');
        window.location.href='../menu.html';
        </script>";
    }
?>