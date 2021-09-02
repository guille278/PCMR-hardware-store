<?php
/*include 'loginSecurity.php';
if ($_SESSION['privilegios'] != 'admin') {
    header('location: index.php');
}*/
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar producto</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Valentín Camacho Veloz, Daniel Flores Rodriguez, Brian Valentín Franco, Nancy García Mesillas">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/main.css">
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <?php

    /*include 'barraMenu.php';
$menu = new menu();
$menu ->barraMenu();*/

    require_once '../../models/Producto.php';
    $producto = new producto();
    $producto->setIdProducto($_GET['id']);
    $producto->productoModificar();
    ?>
    <div class="container">
        <div class="page-header">
            <h3 style="text-align: center">Modificar Producto</h3>
        </div>
        <form class="form-horizontal" action="../../controllers/aplicarMovimiento.php" method="post" onsubmit="return confirm('¿Seguro que quieres guardar esta modificación?');">
            <div class="form-group row">
                <label class="control-label col-sm-2" for="idProducto">Codigo del producto:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idProducto" name="idProducto" value="<?php echo $producto->getIdProducto(); ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="imagen">Imagen:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $producto->getImagen(); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto->getNombre(); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="marca">Marca:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="marca" id="marca" value="<?php echo $producto->getMarca(); ?>" required>
                        <?php

                        echo '<option value="Acer">Acer</option>';
                        echo '<option value="Asus">Asus</option>';
                        echo '<option value="Apple">Apple</option>';
                        echo '<option value="Compaq">Compaq</option>';
                        echo '<option value="Cisco">Cisco</option>';
                        echo '<option value="Dell">Dell</option>';
                        echo '<option value="HP">HP</option>';
                        echo '<option value="Lenovo">Lenovo</option>';
                        echo '<option value="TP-Link">TP-Link</option>';

                        ?>

                    </select>

                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="descripcion">Descripcion:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $producto->getDescripcion(); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="precio">Precio:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $producto->getPrecio(); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="stok">Disponibles:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stok" name="stock" value="<?php echo $producto->getStock(); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="estado">Estado:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="estado" id="estado">
                        <?php
                        if ($producto->getEstado()) {
                            echo '<option value="1" selected>Activo</option>';
                            echo '<option value="0">Eliminar</option>';
                        } else {
                            echo '<option value="0" selected>Eliminado</option>';
                            echo '<option value="1">Activar</option>';
                        }
                        ?>

                    </select>

                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="categoria">Categoria:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoria" id="categoria">
                        <?php

                        echo '<option value="1">Redes</option>';
                        echo '<option value="2">Hardware</option>';
                        echo '<option value="3">Computadoras</option>';
                        echo '<option value="4">Seguridad</option>';

                        ?>

                    </select>

                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="productoModificarGuardar">Guardar</button>
                    <a href="productoConsulta.php" class="btn btn-danger">Regresar</a>
                </div>
            </div>


    </div>
    </form>
    </div>
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