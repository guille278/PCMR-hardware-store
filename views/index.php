<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">
  <title>PCMR │ Inicio</title>
</head>

<body>

  <?php
  include_once 'templates/header.php';
  require_once '../controllers/controllerProducto.php';
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



  <main>
    <div class="wrap-nuevo">
      <div class="container">
        <h1 style="text-transform: uppercase;"><strong>Nuevos productos</strong></h1>
        <hr>
      </div>
      <div class="content-nuevo container">
        <?php
        foreach ($listaProductos as $key => $value) { ?>
          <a href="detalleProducto.php?id=<?php echo $value['idProducto'] ?>&action=detalle">
            <div class="tarjeta">
              <div class="img">
                <span class="badge badge-danger">Nuevo <i class="fas fa-fire-alt"></i></span>
                <img src="<?php echo $value['imagen']; ?>" alt="<?php echo $value['nombre'] . ' - ' . $value['marca']; ?>">
              </div>
              <div class="info-tarjeta">
                <h3 style="font-size: 1.4rem;"><?php echo strtoupper($value['nombre']) ?></h3>
                <p>Marca: <?php echo $value['marca'] ?></p>
                <p><?php echo $value['descripcion'] ?></p>
                <p><?php echo $value['precio'] ?></p>
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
        <?php
        }
        ?>
      </div>
  </main>

  <section>
    <div class="wrap-servicios" id="nosotros">
      <div class="content-servicios">
        <div class="titulo container">
          <h2 class="text-center" ><strong style="color: var(--primaryColor);">PCMR</strong> es el distribuidor global líder más importante en telecomunicaciones, seguridad y equipo de cómputo en el país.</h2>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap-marcas">
      <div class="content-marcas container">
        <h2><strong>Contamos con las mejores marcas del mercado.</strong></h2>
        <div class="marcas">
          <img src="../img/hp.png" alt="">
          <img src="../img/Hikvision-Logo.png" alt="">
          <img src="../img/kingston.png" alt="">
          <img src="../img/asus-logo.svg" alt="">
          <img src="../img/gigabyte.png" alt="">
          <img src="../img/nvidia.png" alt="">
          <img src="../img/cisco.png" alt="">
          <img src="../img/tplink.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <?php
  include_once 'templates/footer.php';
  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>