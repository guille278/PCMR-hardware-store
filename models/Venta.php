<?php

require_once 'Conexion.php';

class Venta
{

  private $idVenta;
  private $fechaVenta;
  private $estado;
  private $total;
  private $idCliente;

  //Atributos producto_venta
  private $idProducto;
  private $cantidad;

  /**
   * @return mixed
   */
  public function getIdProducto()
  {
    return $this->idProducto;
  }

  /**
   * @param mixed $idProducto
   */
  public function setIdProducto($idProducto)
  {
    $this->idProducto = $idProducto;
  }

  /**
   * @return mixed
   */
  public function getCantidad()
  {
    return $this->cantidad;
  }

  /**
   * @param mixed $cantidad
   */
  public function setCantidad($cantidad)
  {
    $this->cantidad = $cantidad;
  }

  /**
   * @return mixed
   */
  public function getIdVenta()
  {
    return $this->idVenta;
  }

  /**
   * @param mixed $idVenta
   */
  public function setIdVenta($idVenta)
  {
    $this->idVenta = $idVenta;
  }

  /**
   * @return mixed
   */
  public function getFechaVenta()
  {
    return $this->fechaVenta;
  }

  /**
   * @param mixed $fechaVenta
   */
  public function setFechaVenta($fechaVenta)
  {
    $this->fechaVenta = $fechaVenta;
  }

  /**
   * @return mixed
   */
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * @param mixed $estado
   */
  public function setEstado($estado)
  {
    $this->estado = $estado;
  }

  /**
   * @return mixed
   */
  public function getTotal()
  {
    return $this->total;
  }

  /**
   * @param mixed $total
   */
  public function setTotal($total)
  {
    $this->total = $total;
  }

  /**
   * @return mixed
   */
  public function getIdCliente()
  {
    return $this->idCliente;
  }

  /**
   * @param mixed $idCliente
   */
  public function setIdCliente($idCliente)
  {
    $this->idCliente = $idCliente;
  }


  public function realizarVenta()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('EXECUTE p_realizarVenta :total, :idCliente');
      $pdo->bindValue(':total', $this->getTotal());
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      $pdo->execute();
      return $conn->lastInsertId();
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function guardarDetalleVenta()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('EXECUTE p_guardarDetalleVenta :idVenta, :idProducto, :cantidad');
      $pdo->bindValue(':idVenta', $this->getIdVenta());
      $pdo->bindValue(':idProducto', $this->getIdProducto());
      $pdo->bindValue(':cantidad', $this->getCantidad());
      $pdo->execute();
    } catch (Exception $e) {
      echo 'Error en la consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function verPedidos()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('EXECUTE p_consultaPedidosCliente :idCliente');
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      foreach ($resultado as $key => $value) {
        $pedidos[$key] = array(
          'idVenta' => $value['idVenta'],
          'fechaVenta' => $value['fechaVenta'],
          'estado' => $value['estado'],
          'total' => $value['total']
        );
      }
      return $pedidos;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function detalleVenta()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('EXECUTE p_detalleVenta :idVenta');
      $pdo->bindValue(':idVenta', $this->getIdVenta());
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      foreach ($resultado as $key => $value) {
        $detalle[$key] = array(
          'idProducto' => $value['idProducto'],
          'imagen' => $value['imagen'],
          'nombreP' => $value['nombre'],
          'marca' => $value['marca'],
          'cantidad' => $value['cantidad'],
          'precio' => $value['precio'],
          'idVenta' => $value['idVenta'],
          'estado' => $value['estado'],
          'total' => $value['total'],
        );
      }
      return $detalle;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }
}
