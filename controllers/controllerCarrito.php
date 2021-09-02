<?php
$total = 0;
require_once '../models/Carrito.php';
require_once '../models/Cliente.php';
$carrito = new Carrito();
$cliente = new Cliente();
if (isset($_SESSION['id_cliente'])) {
    $total = $carrito->contarCarrito($_SESSION['id_cliente']);
}

require_once '../views/templates/header.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'addCarrito':
            if (isset($_SESSION['id_cliente'])) {
                if ($_POST['cantidad'] > 0) {
                    if ($_POST['cantidad'] <= $_GET['stock']) {
                        $carrito->setIdProducto($_GET['id']);
                        $carrito->setIdCliente($_SESSION['id_cliente']);
                        $carrito->setCantidad($_POST['cantidad']);

                        echo 'idCliente' . $carrito->getIdCliente() . '<br>';
                        echo 'idProducto' . $carrito->getIdProducto() . '<br>';
                        echo 'cantidad' . $carrito->getCantidad() . '<br>';
                        $exito = $carrito->agregarCarrito();
                        if ($exito) {
                            header('location: ../views/carrito.php?action=verCarrito&exito=1');
                        } else {
                            echo 'Error al agregar';
                        }
                    } else {
                        echo 'Debe seleccionar mas de un articulo.';
                        header('Location: ../views/detalleProducto.php?id=' . $_GET['id'] . '&action=detalle&error=2');
                    }
                } else {
                    echo 'Debe seleccionar mas de un articulo.';
                    header('Location: ../views/detalleProducto.php?id=' . $_GET['id'] . '&action=detalle&error=1');
                }
            } else {
                header('Location: ../views/login.php?error=2');
            }
            break;
        case 'verCarrito':
            if (isset($_SESSION['id_cliente'])) {
                $cliente->setIdCliente($_SESSION['id_cliente']);
                $carrito->setIdCliente($_SESSION['id_cliente']);
                $listaCarrito = $carrito->consultaCarrito();
                $infoCliente = $cliente->consultaInfo();
                require_once 'carrito.php';
            } else {
                header('Location: login.php?error=2');
            }

            break;

        case 'eliminarCarrito':
            if (isset($_GET['idCliente']) && isset($_GET['id'])) {
                $carrito->setIdCliente($_GET['idCliente']);
                $carrito->setIdProducto($_GET['id']);
                $exito = $carrito->eliminarCarrito();
                if ($exito) {
                    header('Location: ../views/carrito.php?action=verCarrito&eliminar=1');
                } else {
                    header('Location: ../views/carrito.php?action=verCarrito&eliminar=0');
                }
            }
            break;

        case 'actualizarCarrito':
            if (isset($_GET['idCliente']) && isset($_GET['id'])) {
                $carrito->setIdCliente($_GET['idCliente']);
                $carrito->setIdProducto($_GET['id']);
                $carrito->setCantidad($_POST['cantidad']);
                $exito = $carrito->actualizaCarrito();
                if ($exito) {
                    header('Location: ../views/carrito.php?action=verCarrito&actualizar=1');
                } else {
                    header('Location: ../views/carrito.php?action=verCarrito&actualizar=0');
                }
            } else {
                header('Location: ../views/carrito.php?action=verCarrito&actualizar=0');
            }
            break;
    }
} else {
}
