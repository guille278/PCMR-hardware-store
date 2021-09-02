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

    <title>PCMR │ Login</title>
</head>

<body>

    <?php
    include_once 'templates/header.php';
    ?>

    <?php
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case '1': ?>
                <div class="">
                    <div class="alert alert-danger text-center" role="alert">
                        <strong><i class="fas fa-times"></i> Usuario y/o contraseña incorrectos.</strong>
                    </div>
                </div>
            <?php break;
            case '2': ?>
                <div class="">
                    <div class="alert alert-info text-center" role="alert">
                        <strong><i class="fas fa-info-circle"></i> Debes iniciar sesión para continuar.</strong>
                    </div>
                </div>
    <?php break;
        }
    } ?>

    <div class="wrap-login">
        <div class="content container">
            <h1 class="text-center"><strong>Iniciar sesión</strong></h1>
            <hr>
            <form action="../controllers/controllerCliente.php?action=login" method="post">
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="pass" placeholder="Contraseña" required>
                <input type="submit" class="botones" value="Iniciar sesión">
                <a href="registro.php">Crea tu cuenta.</a>
            </form>
        </div>
    </div>

    <?php
    include_once 'templates/footer.php';
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

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