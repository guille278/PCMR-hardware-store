<!DOCTYPE html>
<?php
/* include 'loginSecurity.php';*/
?>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Chore Games</title>
  <link rel="shortcut icon" href="favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--bootstrap-->
  <link rel="stylesheet" href="css/bootstrap.css"><!-- Editado para el menu -->
  <!--jquery-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!--bootstrap-js-->
  <script src="js/bootstrap.min.js"></script>

</head>

<body>
  <?php

  require_once '../models/Empleado.php';
  $empleado = new Empleado();

  date_default_timezone_set("America/Mexico_City");

  if (isset($_GET['action']) == 'Alta') //Valida si se envía el formulario
  {
    var_dump($_POST);
    
    $empleado->setNombre($_POST['nombre']);
    $empleado->setApellidoP($_POST['apellidoP']);
    $empleado->setApellidoM($_POST['apellidoM']);
    $empleado->setDireccion($_POST['direccion']);
    $empleado->setTelefono($_POST['telefono']);
    $empleado->setPuesto($_POST['puesto']);
    $empleado->setUsuario($_POST['usuario']);
    $empleado->setPassword($_POST['psw']);
    $empleado->Alta();

  ?>
    <div class="container">
      <br>
      <a href="../views/Empleado/Alta.php" class="btn btn-default">Crear nuevo Registro</a>
      <a href="../views/Empleado/index.php" class="btn btn-default">Salir</a>
    </div>
  <?php

  } else if (isset($_GET['action']) == 'Modificar') {

    print_r($_POST);
    $empleado->setIdEmpleado($_POST['idEmpleado']);
    $empleado->setNombre($_POST['nombre']);
    $empleado->setApellidoP($_POST['apellidoP']);
    $empleado->setApellidoM($_POST['apellidoM']);
    $empleado->setDireccion($_POST['direccion']);
    $empleado->setTelefono($_POST['telefono']);
    $empleado->setPuesto($_POST['puesto']);
    $empleado->setUsuario($_POST['usuario']);
    $empleado->setPassword($_POST['password']);
    $empleado->setEstado($_POST['estado']);
    $empleado->ModificarGuardar();



  ?>
    <div class="container">
      <br>
      <a href="../views/Empleado/Consulta.php" class="btn btn-default">Regresar</a>
      <a href="../views/Empleado/index.php" class="btn btn-default">Salir</a>
    </div>
  <?php
  } else if (isset($_POST['action']) == 'ModificarGuardar') {

    print_r($_POST);
    $empleado->setIdEmpleado($_POST['idCliente']);
    $empleado->setNombre($_POST['nombre']);
    $empleado->setApellidoP($_POST['apellidoP']);
    $empleado->setApellidoM($_POST['apellidoM']);
    $empleado->setDireccion($_POST['direccion']);
    $empleado->setTelefono($_POST['telefono']);
    $empleado->setPuesto($_POST['puesto']);
    $empleado->setIdUsuario($_POST['idUsuario']);
    $empleado->setUsuario($_POST['usuario']);
    $empleado->setPassword($_POST['password']);
    $empleado->setEstado($_POST['estado']);
    $empleado->ModificarGuardar();



  ?>
    <div class="container">
      <br>
      <a href="../views/Empleado/Consulta.php" class="btn btn-default">Regresar</a>
      <a href="../views/Empleado/index.php" class="btn btn-default">Salir</a>
    </div>
  <?php
  }


  ?>
</body>