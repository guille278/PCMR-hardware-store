<?php

require_once 'Persona.php';
require_once 'Conexion.php';

class Cliente extends Persona
{


  private $idCliente;

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


  public function testConexion()
  {
    try {
      $conn = new Conexion();
      $query = $conn->prepare('SELECT * FROM cliente');
      $query->execute();
      $resultado = $query->fetchAll();
      foreach ($resultado as $key => $value) {
        $clietes[$key] = array(
          $value['idCliente'],
          $value['nombre'],
          $value['apellidoP'],
          $value['apellidoM'],
          $value['direccion'],
          $value['telefono'],
        );
      }
      return $clietes;
    } catch (Exception $e) {
      echo 'Error de consulta';
    }
    $pdo = null;
  }



  public function registro()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('p_registroUsuario :usuario, :pass, :tipo');
      $pdo->bindValue(':usuario', $this->getUsuario());
      $pdo->bindValue(':pass', $this->getPassword());
      $pdo->bindValue(':tipo', 'cliente');
      $pdo->execute();
      $idUsuario = $conn->lastInsertId();
      $pdo = $conn->prepare('p_registroCliente :nombre, :apellidoP, :apellidoM, :direccion, :telefono, :correo, :idUsuario');
      $pdo->bindValue(':nombre', $this->getNombre());
      $pdo->bindValue(':apellidoP', $this->getApellidoP());
      $pdo->bindValue(':apellidoM', $this->getApellidoM());
      $pdo->bindValue(':direccion', $this->getDireccion());
      $pdo->bindValue(':telefono', $this->getTelefono());
      $pdo->bindValue(':correo', $this->getEmail());
      $pdo->bindValue(':idUsuario', $idUsuario);
      $idCliente = $conn->lastInsertId();
      $this->setIdCliente($idCliente);
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

  public function logIn()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('p_validarUsuarioCliente :usuario, :pass');
      $pdo->bindValue(':usuario', $this->getUsuario());
      $pdo->bindValue(':pass', $this->getPassword());
      $pdo->execute();
      $resultado = $pdo->fetch();
      if ($this->getUsuario() == $resultado['usuario'] && $this->getPassword() == $resultado['password'] && $resultado['estado'] == '1' && $resultado['tipo'] == 'cliente') {
        $this->setIdCliente($resultado['idCliente']);
        $this->setNombre($resultado['nombre']);
        $this->setApellidoP($resultado['apellidoP']);
        $this->setApellidoM($resultado['apellidoM']);
        return true;
      } else {
        return false;
      }

    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function consultaInfo()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('SELECT * FROM cliente WHERE idCliente = :idCliente');
      $pdo->bindValue(':idCliente', $this->getIdCliente());
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      foreach ($resultado as $key => $value) {
        $cliente[$key] = array(
          'idCliente' => $value['idCliente'],
          'nombreCliente' => $value['nombre'],
          'apellidoP' => $value['apellidoP'],
          'apellidoM' => $value['apellidoM'],
          'direccion' => $value['direccion'],
          'telefono' => $value['telefono'],
          'correo' => $value['correo'],
        );
      }
      return $cliente;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }
}
