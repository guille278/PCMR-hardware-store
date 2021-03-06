<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">

    <title>Registro</title>
</head>

<body>
    <?php
    include_once 'templates/header.php';
    ?>

    <div class="wrap-registro">
        <div class="container">
            <div class="form-registro">
                <div class="img-form"></div>
                <div class="content">
                    <h1><strong>Registro</strong></h1>
                    <hr>
                    <form action="../../controllers/Empleado.php?action=Alta" method="post">
                        <input type="text" name="nombre" placeholder="Nombre" data-toggle="tooltip" data-placement="right" title="Nombre" required>
                        <input type="text" name="apellidoP" placeholder="Apellido paterno" data-toggle="tooltip" data-placement="right" title="Apellido paterno" required>
                        <input type="text" name="apellidoM" placeholder="Apellido materno" data-toggle="tooltip" data-placement="right" title="Apellido materno" required>
                        <input type="text" name="direccion" placeholder="Direccion" data-toggle="tooltip" data-placement="right" title="Direccion" required>
                        <input type="tel" name="telefono" placeholder="Telefono" data-toggle="tooltip" data-placement="right" title="Telefono" required>
                        <input type="text" name="puesto" placeholder="PUesto" data-toggle="tooltip" data-placement="right" title="Puesto" required>
                        <input type="text" name="usuario" placeholder="Usuario" data-toggle="tooltip" data-placement="right" title="Usuario" required>
                        <input type="password" name="psw" placeholder="Contrase??a" data-toggle="tooltip" data-placement="right" title="Contrase??a" required>
                        <input type="submit" class="botones" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    include_once 'templates/footer.php';
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
