<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">
  <title>PCMR │ Pedidos</title>
</head>

<body>

  <?php
  require_once '../controllers/controllerPedido.php';
  if (isset($_GET['exito']) == '1') { ?>
    <div class="container">
      <div class="alert alert-success" role="alert">
        <strong><i class="fas fa-check"></i> ¡Pedido realizado con éxito!.</strong>
      </div>
    </div>
  <?php }
  ?>

  <div class="wrap-pedidos">
    <div class="container">
      <h2><strong><i class="fas fa-clipboard-list"></i> Pedidos</strong></h2>
      <div class="content-pedidos">
        <?php
        foreach ($listaPedidos as $key => $value) { ?>
          <div class="tarjeta-pedido">
            <div class="info-pedido" style="display: inline;">
              <p><small class="text-muted">NV000<?php echo $value['idVenta']; ?></small></p>
              <p>Fecha del pedido: <?php echo $value['fechaVenta']; ?></p>
              <p>Estado del pedido:
                <?php
                switch ($value['estado']) {
                  case '1': ?>
                    <span class="text-warning">Pendiente.</span>
                    <div class="progress">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <?php break;
                  case '2': ?>
                    <span class="text-primary">En camino.</span>
                    <div class="progress">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <?php break;
                  case '3': ?>
                    <span class="text-success">Entregado.</span>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <?php break;

                  default: ?>
                    <span class="text-danger">Cancelado.</span>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                <?php break;
                }
                ?>
              </p>
              <p class="mt-3"><strong>Total: $<?php echo number_format($value['total'], 2, '.', ','); ?></strong></p>
            </div>
            <div class="ver-detalle">
              <a href="detallePedido.php?action=detallePedido&idVenta=<?php echo $value['idVenta']; ?>" class="btn botones">Ver detalles</a>
            </div>
          </div>
        <?php }
        ?>
      </div>
    </div>
  </div>

  <?php include_once 'templates/footer.php';
  ?>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>