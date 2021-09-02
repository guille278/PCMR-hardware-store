<?php

/*include 'loginSecurity.php';
if ($_SESSION['privilegios'] != 'admin') {
    header('location: index.php');
}*/
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>hardware</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Equipo de Desarrollo BPEJ">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--jquery-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--bootstrap-js-->
    <script src="js/bootstrap.js"></script>

</head>

<body>
    <?php
    /*include 'barraMenu.php';
$menu = new menu();
$menu ->barraMenu();*/
    ?>
    <?php

    require_once '../../models/Producto.php';
    $producto = new producto();

    ?>
    <div class="container">
        <div class="page-header">
            <h3 style="text-align: center">Ingresa Nuevo Producto</h3>
        </div>
        <form class="form-horizontal" action="../../controllers/aplicarMovimiento.php" method="post" onsubmit="return confirm('¿Seguro que quieres guardar este producto?');">

            <div class="form-group row">
                <label class="control-label col-sm-2" for="nombre">Imagen:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="imagen" placeholder="Imagen" required>

                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="control-form-label col-sm-2" for="marca">Marca:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="marca" placeholder="Marca del producto" id="marca">
                        <?php

                        echo '<option value="Acer">Acer</option>';
                        echo '<option value="Asus">Asus</option>';
                        echo '<option value="Apple">Apple</option>';
                        echo '<option value="Compaq">Compaq</option>';
                        echo '<option value="Cisco">Cisco</option>';
                        echo '<option value="Dell">Dell</option>';
                        echo '<option value="HP" selected>HP</option>';
                        echo '<option value="Lenovo">Lenovo</option>';
                        echo '<option value="TP-Link">TP-Link</option>';

                        ?>

                    </select>

                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="descripcion">Descripcion:</label>
                <div class="col-sm-10">
                    <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Descripcion" style="width: 100%;"></textarea>

                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="precio">Precio:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prcio" name="precio" placeholder="Precio" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-sm-2" for="stock">Disponibles:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Numero de articulos disponibles" required>
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

            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="productoAlta">Guardar</button>
                    <a href="index.php" class="btn btn-danger">Salir</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>