<?php
session_start();
require_once '../controllers/controllerCliente.php';
require_once '../controllers/controllerCarrito.php';
?>



<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="index.php"><strong>PCMR</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio <span class="sr-only"></span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Productos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="catalogo.php?action=redes"><i class="fas fa-server"></i> Redes</a>
            <a class="dropdown-item" href="catalogo.php?action=hardware"><i class="fas fa-memory"></i> Hardware</a>
            <a class="dropdown-item" href="catalogo.php?action=computadoras"><i class="fas fa-desktop"></i> Computadoras</a>
            <a class="dropdown-item" href="catalogo.php?action=seguridad"><i class="fas fa-shield-alt"></i> Seguridad</a>
            <a class="dropdown-item" href="catalogo.php?action=todo"><i class="fas fa-list"></i> Ver todo</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#nosotros">Nosotros <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://pcmasterrace.org" target="_blank">Blog <span class="sr-only"></span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
            if (isset($_SESSION['id_cliente'])) { ?>
              <a class="dropdown-item" href="#"><i class="fas fa-user"></i> <?php echo strtoupper($_SESSION['nombre_cliente'] . ' ' . $_SESSION['app_cliente'] . ' ' . $_SESSION['apm_cliente']); ?></a>
              <a class="dropdown-item" href="pedidos.php?action=verPedidos"><i class="fas fa-clipboard-list"></i> Pedidos</a>
              <a class="dropdown-item text-danger" href="../controllers/controllerCliente.php?action=logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>

            <?php } else { ?>
              <a class="dropdown-item" href="login.php">Iniciar sesión</a>
              <a class="dropdown-item" href="registro.php">Registrar</a>
            <?php }
            ?>
          </div>
        <li class="nav-item">
          <a class="nav-link" href="carrito.php?action=verCarrito"><i class="fas fa-shopping-cart"></i> <?php echo $total; ?><span class="sr-only"></span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>