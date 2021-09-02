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

  <title>PCMR │ Carrito</title>
</head>

<body>
  <?php
  require_once '../controllers/controllerCarrito.php';
  ?>

  <?php


  if (isset($_GET['exito']) == '1') { ?>
    <div class="container">
      <div class="alert alert-success" role="alert">
        <strong><i class="fas fa-check"></i> ¡Producto agregado con éxito!.</strong>
      </div>
    </div>
    <?php }

  if (isset($_GET['eliminar'])) {
    switch ($_GET['eliminar']) {
      case '1': ?>
        <div class="container">
          <div class="alert alert-primary" role="alert">
            <strong><i class="fas fa-info-circle"></i> Artículo eliminado del carrito.</strong>
          </div>
        </div>
      <?php break;
      case '0': ?>
        <div class="container">
          <div class="alert alert-danger" role="alert">
            <strong><i class="fas fa-check"></i>Error al eliminar articulo del carrito.</strong>
          </div>
        </div>
      <?php break;
    }
  }
  if (isset($_GET['actualizar'])) {
    switch ($_GET['actualizar']) {
      case '1': ?>
        <div class="container">
          <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-check"></i> Carrito actualizado.</strong>
          </div>
        </div>
      <?php break;
      case '0': ?>
        <div class="container">
          <div class="alert alert-danger" role="alert">
            <strong><i class="fas fa-check"></i>Error al actualizar el carrito.</strong>
          </div>
        </div>
  <?php break;
    }
  }
  ?>



  <div class="wrap-carrito">
    <div class="content-carrito container">
      <div class="tabla">
        <table class="table table-responsive">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($listaCarrito != null) {
              foreach ($listaCarrito as $key => $value) { ?>
                <tr>
                  <td><img src="<?php echo $value['imagen']; ?>" alt="" style="width: 120px;"></td>
                  <td><?php echo $value['nombre']; ?></td>
                  <td><?php echo $value['descripcion']; ?></td>
                  <td>$<?php echo number_format($value['precio'], 2, '.', ','); ?></td>
                  <td>X<?php echo $value['cantidad']; ?></td>
                  <td><?php echo $value['accion']; ?></td>
                </tr>
            <?php }
            } else {
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="cuenta">
        <?php
        $subtotal = 0;
        if ($listaCarrito != null) {
          foreach ($listaCarrito as $key => $value) {
            $subtotal += $value['precio'] * $value['cantidad'];
          }
        }
        $iva = $subtotal * .16;
        $totalVenta = $subtotal + $iva;
        ?>
        <p><strong>Subtotal:</strong> <?php echo '$' . number_format($subtotal, 2, '.', ','); ?></p>
        <p><strong>IVA:</strong> <?php echo '$' . number_format($iva, 2, '.', ','); ?></p>
        <p><strong>Total:</strong> <?php echo '$' . number_format($totalVenta, 2, '.', ','); ?></p>
        <a href="../controllers/controllerPedido.php?action=realizarVenta&totalVenta=<?php echo $totalVenta  ?>" class="btn botones">Terminar compra</a>
      </div>
    </div>

    <div class="container">
      <h2>Información de envio</h2>
      <hr>
      <p style="font-size: 1.6rem;" >Nombre: <?php echo $infoCliente[0]['nombreCliente'].' '.$infoCliente[0]['apellidoP'].' '.$infoCliente[0]['apellidoM']; ?></p>
      <p style="font-size: 1.6rem;" >Dirección: <?php echo $infoCliente[0]['direccion']; ?></p>
      <p style="font-size: 1.6rem;" >Telófono: <?php echo $infoCliente[0]['telefono']; ?></p>
      <p style="font-size: 1.6rem;" >Correo electrónico: <?php echo $infoCliente[0]['correo']; ?></p>
    </div>
  </div>




  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar carrito</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="../controllers/controllerCarrito.php?action=actualizarCarrito&id=<?php echo $value['idProducto'] ?>&idCliente=<?php echo $_SESSION['id_cliente'] ?>" method="post">
          <div class="modal-body text-center">
            <h3 class="mb-3"><?php echo $value['nombre']; ?></h3>
            <label for="spinner">Cantidad:</label>
            <input type="number" class="spinner" id="spinner" name="cantidad" value="<?php echo $value['cantidad']; ?>">
            <a href="../controllers/controllerCarrito.php?action=eliminarCarrito&id=<?php echo $value['idProducto'] ?>&idCliente=<?php echo $_SESSION['id_cliente'] ?>" class="btn btn-danger">Eliminar</a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <?php

  include_once 'templates/footer.php';


  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  <script>
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  </script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>