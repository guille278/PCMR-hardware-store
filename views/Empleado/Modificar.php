<?php/*
include 'loginSecurity.php';
if ($_SESSION['privilegios'] != 'admin') {
  header('location: index.php');
}*/
?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>BPEJ. Sistema Integral de Gestión</title>
  <link rel="shortcut icon" href="favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Cesar Alexis Quevedo Limón">
  <!--bootstrap-->
  <link rel="stylesheet" href="css/bootstrap.css"><!-- Editado para el menu -->
  <!--jquery-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <!--bootstrap-js-->
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>
<body>
<?php /*
        include 'barraMenu.php';
        $menu = new menu();
        $menu ->barraMenu();
        */
require_once '../../models/empleado.php';
$empleado = new empleado();
$empleado->setIdEmpleado($_GET['id']);

$empleado->Modificar();
?>
<div class="container">
  <div class="page-header">
    <h3 style="text-align: center">Modificar Empleaado</h3>
  </div>
  <form action="../../controllers/Empleado.php?action=ModificarGuardar" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="id">Empleado:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="idEmpleado" name="idEmpleado" value="<?php echo $empleado->getIdEmpleado(); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado->getNombre(); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="apellidoP">Apellido Paterno:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="apellidoP"  name="apellidoP" value="<?php echo $empleado->getApellidoP(); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="apellidoM">Apellido Materno:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="<?php echo $empleado->getApellidoM(); ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="direccion">Dirección :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $empleado->getDireccion(); ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="telefono">Telefono:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="telefono" name="telefono"
               value="<?php echo $empleado->getTelefono(); ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="puesto">Puesto :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $empleado->getPuesto(); ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="idUsuario">Numero Usuario:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $empleado->getIdUsuario(); ?>" required>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="usuario">Usuario:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $empleado->getUsuario(); ?>" required>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Pasword:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="password" name="password" value="<?php echo $empleado->getPassword(); ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="estado">Estatus:</label>
      <div class="col-sm-10">
        <select class="form-control" name="estado" id="estado">
          <?php
          if($empleado->getEstado()){
            echo '<option value="1" selected>Activo</option>';
            echo '<option value="0">Eliminar</option>';
          }else{
            echo '<option value="0" selected>Eliminado</option>';
            echo '<option value="1">Activar</option>';

          }
          ?>

        </select>

      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="/../models/ModificarGuardar">Guardar</button>
        <a href="Consulta.php" class="btn btn-default">Regresar</a>
      </div>
    </div>
  </form>

</div>
</body>
</html>

