<?php
require_once '../models/Producto.php';
$producto = new Producto();


if (isset($_GET['action'])) {
  $action = $_GET['action'];
  switch ($action) {
    case 'redes':
      $msj = '<i class="fas fa-server"></i> Redes';
      $listaProductos = $producto->consultaCategoria('1');
      require_once 'catalogo.php';
      break;
    case 'hardware':
      $listaProductos = $listaProductos = $producto->consultaCategoria('2');
      $msj = '<i class="fas fa-memory"></i> Hardware';
      require_once 'catalogo.php';
      break;
    case 'computadoras':
      $listaProductos = $listaProductos = $producto->consultaCategoria('3');
      $msj = '<i class="fas fa-desktop"></i> Computadoras';
      require_once 'catalogo.php';
      break;
    case 'seguridad':
      $listaProductos = $listaProductos = $producto->consultaCategoria('4');
      $msj = '<i class="fas fa-shield-alt"></i> Seguridad';
      require_once 'catalogo.php';
      break;
    case 'todo':
      $listaProductos = $producto->consultaTodo();
      $msj = '<i class="fas fa-list"></i> Ver todo';
      require_once 'catalogo.php';
      break;

    case 'detalle':
      $msj = 'detalle';
      $producto->setIdProducto($_GET['id']);
      $detalles = $producto->consultaDetalle();
      require_once 'detalleProducto.php';
      break;
  }
} else {
  $listaProductos = $producto->consultaNuevo();
  require_once 'index.php';
}
