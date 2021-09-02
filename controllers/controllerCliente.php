<?php
require_once '../views/templates/header.php';
require_once '../models/Cliente.php';
$cliente = new Cliente();
if (isset($_GET['action'])) {
  $action = $_GET['action'];
  switch ($action) {
    case 'register':
      $cliente->setNombre($_POST['nombre']);
      $cliente->setApellidoP($_POST['apellidoP']);
      $cliente->setApellidoM($_POST['apellidoM']);
      $cliente->setDireccion($_POST['direccion']);
      $cliente->setTelefono($_POST['telefono']);
      $cliente->setEmail($_POST['email']);
      $cliente->setUsuario($_POST['usuario']);
      $cliente->setPassword($_POST['psw']);
      $exito = $cliente->registro();
      if ($exito) {
        $_SESSION['id_cliente'] = $cliente->getIdCliente();
        $_SESSION['nombre_cliente'] = $cliente->getNombre();
        $_SESSION['app_cliente'] = $cliente->getApellidoP();
        $_SESSION['apm_cliente'] = $cliente->getApellidoM();
        header('Location: ../views/index.php');
      } else {
        // Reparar mensaje de error...
        header('Location: ../views/registro.php');
      }
      break;

    case 'login':
      $cliente->setUsuario($_POST['usuario']);
      $cliente->setPassword($_POST['pass']);
      $exito = $cliente->logIn();
      if ($exito) {
        $_SESSION['id_cliente'] = $cliente->getIdCliente();
        $_SESSION['nombre_cliente'] = $cliente->getNombre();
        $_SESSION['app_cliente'] = $cliente->getApellidoP();
        $_SESSION['apm_cliente'] = $cliente->getApellidoM();
        header('Location: ../views/index.php');
      } else {
        header('Location: ../views/login.php?error=1');
      }
      break;

    case 'logout':
      session_unset();
      session_destroy();
      header('Location: ../views/index.php');
      break;
  }
}
