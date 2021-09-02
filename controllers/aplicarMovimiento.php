    <!DOCTYPE html>
    <?php
    // include 'loginSecurity.php';
    ?>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>hardware</title>
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
    /*include 'barraMenu.php';
    $menu = new menu();
    $menu ->barraMenu();
*/
    date_default_timezone_set("America/Mexico_City");

    if(isset($_POST['productoAlta']))//Valida si se envía el formulario
    {
        require_once '../models/Producto.php';
        $producto = new producto();
        $producto->setNombre($_POST['imagen']);
        $producto->setNombre($_POST['nombre']);
        $producto->setMarca($_POST['marca']);
        $producto->setDescripcion($_POST['descripcion']);
        $producto->setPrecio($_POST['precio']);
        $producto->setStock($_POST['stock']);
        $producto->setCategoria($_POST['categoria']);
        $producto->productoAlta();
        ?>
    <div class="alert alert-info" role="alert"> <a href="#" class="alert-link"></a>
        <div class="container">
            <br>
            <center><a href="productoAlta.php" class="btn btn-primary">Agregar nuevo Registro</a>
                <a href="productoConsulta.php" class="btn btn-primary">Ver Productos</a>
                <a href="index.php" class="btn btn-danger">Salir</a></center>
        </div>
        <?php


    }
        elseif (isset($_POST['productoModificarGuardar']))//Valida si se envía el formulario
        {

            require_once '../models/Producto.php';
            $producto= new producto();
            $producto->setIdProducto($_POST['idProducto']);
            $producto->setImagen($_POST['imagen']);
            $producto->setNombre($_POST['nombre']);
            $producto->setMarca($_POST['marca']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setPrecio($_POST['precio']);
            $producto->setStock($_POST['stock']);
            $producto->setEstado($_POST['estado']);
            $producto->setCategoria($_POST['categoria']);
            $producto->productoModificarGuardar();


            ?>
        <div class="alert alert-info" role="alert"> <a href="#" class="alert-link"></a>
            <div class="container">
                <br>
                <center><a href="../views/empleado/productoConsulta.php" class="btn btn-primary">Regresar</a>
                <a href="../views/empleado/productoConsulta.php" class="btn btn-danger">Salir</a></center>
            </div>
        </div>
            <?php
        }

        ?>


</body>
</html>