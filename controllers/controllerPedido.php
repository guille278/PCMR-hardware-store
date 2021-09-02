<?php
require_once '../views/templates/header.php';
require_once '../models/Venta.php';
require_once '../models/Carrito.php';
$carrito = new Carrito();
$venta = new Venta();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'verPedidos':
            if (isset($_SESSION['id_cliente'])) {
                $venta->setIdCliente($_SESSION['id_cliente']);
                $listaPedidos = $venta->verPedidos();
            }
            require_once 'pedidos.php';
            break;

        case 'detallePedido':
            if (isset($_GET['idVenta'])) {
                $venta->setIdVenta($_GET['idVenta']);
                $detalleVenta = $venta->detalleVenta();
                require_once 'detallePedido.php';
            }
            break;

        case 'realizarVenta':
            if (isset($_SESSION['id_cliente']) && isset($_GET['totalVenta'])) {
                //-------------------- GUARDO LA VENTA ---------------------
                $venta->setIdCliente($_SESSION['id_cliente']);
                $venta->setTotal($_GET['totalVenta']);
                $idVenta = $venta->realizarVenta();
                //-------------------- GUARDO EL DETALLE DE LA VENTA ---------------------
                $carrito->setIdCliente($_SESSION['id_cliente']);
                $listaCarrito = $carrito->consultaCarrito();
                for ($fila = 0; $fila < count($listaCarrito); $fila++) {
                    $venta->setIdVenta($idVenta);
                    $venta->setIdProducto($listaCarrito[$fila]['idProducto']);
                    $venta->setCantidad($listaCarrito[$fila]['cantidad']);
                    $venta->guardarDetalleVenta();
                    //-------------------- LIMPIO EL CARRITO ---------------------
                    $carrito->setIdCliente($_SESSION['id_cliente']);
                    $carrito->limpiarCarrito();
                }
                header('Location: ../views/pedidos.php?action=verPedidos&exito=1');
            }

            break;
    }
}
