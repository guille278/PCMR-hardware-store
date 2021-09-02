<?php
  /*
include 'loginSecurity.php';
if ($_SESSION['privilegios'] != 'admin') {
  header('location: index.php');
}*/
  ?> <!DOCTYPE html>
  <?php

  require_once '../../models/empleado.php';
  $empleado = new empleado();

  ?>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <title>Consulta Empleados</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Equipo de Desarrollo BPEJ">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    
  </head>

  <body>
    <?php
    /*include 'barraMenu.php';
$menu = new menu();
$menu ->barraMenu();*/
    ?>

    <div class="container-fluid">
      <div class="page-header">
        <h3 style="text-align: center">
          <p>Listado de Empleados</p>
        </h3>

      </div>
      <!--tabla de consulta-->
      <div id="respuestaFiltro">
        <table id="dtPlantilla" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>IdEmpleado</th>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Puesto</th>
              <th>IdUsuario</th>
              <th></th>


            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <!--tabla de consulta-->

      <a href="index.php" class="btn btn-default">Salir</a>
    </div>

    <br>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script>
      var arregloDT = <?php echo json_encode($empleado->Consulta()); ?>;
      $(document).ready(function() {
        var t = 'Listado de Empleados';
        $('#dtPlantilla').DataTable({
          "data": arregloDT,
          "order": [
            [0, "asc"]
          ],
          responsive: true,
          dom: '<"col-sm-5"l><"col-sm-3"B><"col-sm-4"f>rtip',
          //                    dom: es el orden de las funciones de la tabla
          //                    l: es la lista de numero de registros que se muestran
          //                    B: son los botones para imprimir
          //                    f: es el filtro de busqueda
          //                    rt: son los registros de la tabla
          //                    i: es la información de registros
          //                    p: es la barra de paginación
        });
      });
    </script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


  </body>

  </html>