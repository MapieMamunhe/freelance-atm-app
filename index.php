<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entrar</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/estilos.css" />
  </head>
  <body>
    <?php
      if(isset($_GET["msg"])){
        echo "
        <script>
          alert(".$_GET["msg"].");
        </script>
        ";
      }
    ?>
    <div id="corpo">
      <div class="msg"></div>
      <div class="formulario-login">
        <h2>Seja bem-vindo ao BARCLAYS</h2>
        <form action="./login.php" method="get">
          <p class="form-group form-check">
            <label class="form-check-label">Numero da conta</label>
            <input
              type="number"
              class="form-control"
              name="conta"
              id=""
              required
            />
          </p>
          <p class="form-group form-check">
            <label class="form-check-label">Password</label>
            <input type="password" class="form-control" name="senha" required />
          </p>
          <p id="send">
            <input type="submit" value="Entrar" class="btn btn-success" />
          </p>
        </form>
      </div>
    </div>
  </body>
</html>
