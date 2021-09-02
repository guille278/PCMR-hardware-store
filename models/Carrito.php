<?php

require_once 'Conexion.php';

class Carrito
{
  private $idCliente;
  private $idProducto;
  private $cantidad;

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



  public function contarCarrito($idCliente)
  {
    try {
      $total = 0;
      $conn = new Conexion();
      $pdo = $conn->prepare('SELECT COUNT(idProducto) "total" FROM carrito WHERE idCliente = :idCliente');
      $pdo->bindValue(':idCliente', $idCliente);
      if ($pdo->execute() == 1) {
        if ($resultado = $pdo->fetch()) {
          $total = $resultado['total'];
          return $total;
        } else {
          return $total;
        }
      }
    } catch (Exception $e) {
      echo 'Error en la consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }


  public function agregarCarrito()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('INSERT INTO carrito VALUES (:idCliente, :idProducto, :cantidad)');
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      $pdo->bindValue(':idProducto', $this->getIdProducto());
      $pdo->bindValue(':cantidad', $this->getCantidad());
      if ($pdo->execute() >= 1) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      echo 'Error en la consulta ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function eliminarCarrito()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('DELETE carrito WHERE idProducto = :idProducto AND idCliente = :idCliente');
      $pdo->bindValue(':idProducto', $this->getIdProducto());
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      if ($pdo->execute() == 1) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      echo 'Error en la consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function consultaCarrito()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('SELECT c.*, p.* FROM carrito c JOIN producto p ON c.idProducto = p.idProducto WHERE c.idCliente = :idCliente');
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      $btn = '<button type="button" class="" data-toggle="modal" data-target="#exampleModal">
      <i class="fas fa-pen"></i>
    </button>';
      foreach ($resultado as $key => $value) {
        $carrito[$key] = array(
          'idProducto' => $value['idProducto'],
          'imagen' => $value['imagen'],
          'nombre' => $value['nombre'],
          'descripcion' => $value['descripcion'],
          'precio' => $value['precio'],
          'cantidad' => $value['cantidad'],
          'accion' => $btn
        );
      }
      return $carrito;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function actualizaCarrito()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('UPDATE carrito SET cantidad = :cantidad WHERE idProducto = :idProducto AND idCliente = :idCliente');
      $pdo->bindValue(':cantidad', $this->getCantidad());
      $pdo->bindValue(':idProducto', $this->getIdProducto());
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      if ($pdo->execute() == 1) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function limpiarCarrito()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('DELETE carrito WHERE idCliente = :idCliente');
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      $pdo->execute();
    } catch (Exception $e) {
      echo 'Error en la consulta: '.$e->getMessage();
    }
    $pdo = null;
  }
}
