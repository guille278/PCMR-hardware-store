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
  <title>PCMR │ Productos</title>
</head>

<body>


  <?php
  require_once '../controllers/controllerProducto.php';
  include_once 'templates/header.php';
  ?>

  <section class="wrap-hero">
    <div class="content-hero container">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/banner-ejemplo2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/banner-ejemplo3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/banner-ejemplo4.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>

  <div class="container">
    <h1 class="text-uppercase"><strong><?php echo $msj ?></strong></h1>
    <hr>
  </div>

  <div class="content-nuevo container">
    <?php
    foreach ($listaProductos as $key => $value) { ?>
      <a href="detalleProducto.php?id=<?php echo $value['idProducto']; ?>&action=detalle">
        <div class="tarjeta">
          <div class="img">
            <img src="<?php echo $value['imagen']; ?>" alt="<?php echo $value['nombre'] . ' - ' . $value['marca']; ?>">
          </div>
          <div class="info-tarjeta">
            <h4 style="font-size: 1.4rem;"><?php echo strtoupper($value['nombre']); ?></h4>
            <p>Marca: <?php echo $value['marca'] ?></p>
            <small class="text-muted"><?php echo $value['descripcion']; ?></small>
            <p><?php echo $value['precio']; ?></p>
            <?php
            $disponible = 'text-primary';
            if ($value['stock'] == 0) {
              $disponible = 'text-danger';
            }
            ?>
            <p class="<?php echo $disponible; ?>">Disponible: <?php echo $value['stock']; ?></p>
          </div>
        </div>
      </a>
    <?php }
    ?>
  </div>

  <?php
  include_once 'templates/footer.php';
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